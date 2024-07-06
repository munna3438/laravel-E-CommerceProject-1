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
    public function add_catagory()
    {
        return view('admin.catagory.add_catagory');
    }
    public function list_catagory()
    {
        return view('admin.catagory.list_catagory');
    }
    public function edit_catagory()
    {
        return view('admin.catagory.edit_catagory');
    }
}