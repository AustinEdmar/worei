<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'cargo' => ['nullable', 'string', 'max:255'],

            'photo' => ['nullable', 'image'],

            'role' => ['required', 'in:admin,user,staff']

        ]);
    }


    /**
     * Register user
     */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        $photoPath = null;

        if ($request->hasFile('photo')) {

            $photoPath = $request->file('photo')->store('users', 'public');

        }

        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'cargo' => $request->cargo,

            'photo' => $photoPath,

            'role' => $request->role ?? 'staff',

            'is_active' => true

        ]);

        $this->guard()->login($user);

        return redirect($this->redirectTo);

    }

}