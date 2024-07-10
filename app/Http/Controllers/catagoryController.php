<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class catagoryController extends Controller
{
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
        return Redirect::back()->with('msg', 'Catagory add successfully');
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
        return Redirect::route('list.catagory')->with('msg', 'Catagory update successfully');
    }
    public function delete_catagory($id){
        catagory::find($id)->delete();
        return Redirect::back()->with('msg','Catagory deleted successfully');
    }
}
