<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{

    public function dashboard() {
        if(auth()->user()->usertype === 'admin') {
            return view('admin.admin-dashboard');
        }
        return view('admin.user-dashboard');
    }
}