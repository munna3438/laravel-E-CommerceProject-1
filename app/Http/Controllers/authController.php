<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{

    public function dashboard()
    {
        if (auth()->user()->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    }
    protected function adminDashboard()
    {
        return view('layouts.admin.admin');
    }
    protected function userDashboard()
    {
        return view('layouts.user.user');
    }
}