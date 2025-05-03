<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        return view('home');
    }

    public function adminDashboard()
    {
        $users = User::all();
        return view('layouts.admin-dashboard', compact('users'));
    }

    public function sales()
    {
        if (!Auth::check() || Auth::user()->role !== 'sales') {
            return redirect('/login');
        }
        return view('layouts.sales');
    }

public function manager()
{
    if (!Auth::check() || Auth::user()->role !== 'manager') {
        return redirect('/login');
    }
    return view('layouts.manager-dashboard');
}

}