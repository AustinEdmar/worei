<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{

    public function index()
    {

        $members = TeamMember::orderBy('order')->paginate(10);

        return view('dashboard.team.index', compact('members'));

    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'name' => 'required',
            'role' => 'required',
            'bio' => 'nullable',
            'photo' => 'nullable|image',
            'email' => 'nullable|email',
            'linkedin' => 'nullable',
            'twitter' => 'nullable',
            'order' => 'nullable|integer',
            'is_active' => 'nullable'

        ]);

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('team', 'public');

            $data['photo'] = $path;

        }

        $data['is_active'] = $request->has('is_active');

        TeamMember::create($data);

        return back()->with('success', 'Membro criado');

    }

    public function update(Request $request, TeamMember $team)
    {

        $data = $request->validate([

            'name' => 'required',
            'role' => 'required',
            'bio' => 'nullable',
            'photo' => 'nullable|image',
            'email' => 'nullable|email',
            'linkedin' => 'nullable',
            'twitter' => 'nullable',
            'order' => 'nullable|integer',
            'is_active' => 'nullable'

        ]);

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('team', 'public');

            $data['photo'] = $path;

        }

        $data['is_active'] = $request->has('is_active');

        $team->update($data);

        return back()->with('success', 'Atualizado');

    }

    public function destroy(TeamMember $team)
    {

        $team->delete();

        return back()->with('success', 'Removido');

    }


}
