<?php

namespace App\Http\Controllers;

class AuthViewController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-register');
    }
}