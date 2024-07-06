<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\Validate;

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
    public function store_catagory(Request $request)
    {
        $request->validate([
            'catagoryName' => 'required'
        ]);
        catagory::create([
            'catagoryName' => $request->catagoryName
        ]);
        return Redirect::back()->with('msg', 'product add successfully');
    }
    public function list_catagory()
    {
        $catagorys = catagory::all();

        return view('admin.catagory.list_catagory', compact('catagorys'));
    }
    public function edit_catagory($id)
    {
        $catagory = catagory::find($id);

        return view('admin.catagory.edit_catagory', compact('catagory'));
    }
    public function update_catagory(Request $request, $id)
    {
        $request->validate([
            'catagoryName' => 'required'
        ]);
        catagory::find($id)->update([
            'catagoryName' => $request->catagoryName
        ]);
        return Redirect::route('list.catagory')->with('msg', 'product update successfully');
    }
}