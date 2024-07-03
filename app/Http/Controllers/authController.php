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
    public function catagory()
    {
        return view('admin.catagory');
    }

    protected function adminDashboard()
    {
        return view('admin.admin-dashboard');
    }

    protected function userDashboard()
    {
        return view('admin.user-dashboard');
    }
}
