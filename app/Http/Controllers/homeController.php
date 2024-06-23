<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index() {
        return view('frontend.home');
    }
    public function about() {
        return view('frontend.about');
    }
    public function testimonial() {
        return view('frontend.testimonial');
    }
    public function products() {
        return view('frontend.products');
    }
    public function blog() {
        return view('frontend.blog');
    }
    public function contact() {
        return view('frontend.contact');
    }
}
