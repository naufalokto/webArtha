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
            if ($user->role === 'sales') {
                return redirect()->route('admin.sales.dashboard');
            }
            if ($user->role === 'manager') {
                return redirect()->route('admin.manager.dashboard');
            }
            // Default: customer or other roles
            return redirect()->route('welcome');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'customer', // Set role to customer on registration
        ]);

        Auth::login($user);

        // Redirect all users to welcome page after registration
        return redirect()->route('welcome');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}