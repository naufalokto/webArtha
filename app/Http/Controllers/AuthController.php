<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info('Login attempt', ['email' => $credentials['email']]);
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        Log::info('User found:', ['user' => $user]);

        // Manual password check for debugging
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Log::info('Password matches!');
        } else {
            Log::info('Password does NOT match!');
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if ($user->role === 'manager') {
                return redirect()->route('manager.dashboard');
            }
            if ($user->role === 'sales') {
                return redirect()->route('sales.dashboard');
            }
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}