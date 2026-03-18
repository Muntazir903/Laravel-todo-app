<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{

    public function index()
    {
        return view("tasks/tasks");
    }
    public function viewRegister()
    {
        return view("users/user-register");
    }

    public function viewLogin()
    {
        return view("users/user-login");
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::where('username', $credentials['username'])
            ->where('email', $credentials['email'])
            ->where('password', $credentials['password'])
            ->first();

        if (!$user) {
            return back()
                ->withErrors(['email' => 'The provided credentials are incorrect.'])
                ->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('index');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $request->session()->regenerate();

        return redirect()->route('index');
    }
}
