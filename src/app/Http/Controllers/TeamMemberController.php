<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamMemberController extends Controller
{

    public function index()
    {

        $members = User::where('role', 'staff')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('dashboard.team.index', compact('members'));

    }


    public function store(Request $request)
    {

        $data = $request->validate([

            'name' => 'required',
            'cargo' => 'required',
            'email' => 'nullable|email',
            'photo' => 'nullable|image',
            'password' => 'nullable|min:6'

        ]);

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('users', 'public');

            $data['photo'] = $path;

        }

        $data['password'] = Hash::make($request->password ?? '12345678');

        $data['role'] = 'staff';

        $data['is_active'] = $request->has('is_active');

        User::create($data);

        return back()->with('success', 'Membro criado');

    }


    public function update(Request $request, User $team)
    {

        $data = $request->validate([

            'name' => 'required',
            'cargo' => 'required',
            'email' => 'nullable|email',
            'photo' => 'nullable|image'

        ]);

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('users', 'public');

            $data['photo'] = $path;

        }

        $data['is_active'] = $request->has('is_active');

        $team->update($data);

        return back()->with('success', 'Atualizado');

    }


    public function destroy(User $team)
    {

        $team->delete();

        return back()->with('success', 'Removido');

    }

}