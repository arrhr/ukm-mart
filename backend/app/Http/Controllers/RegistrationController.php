<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $User = User::create(request(['username', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/home');
    }
}
