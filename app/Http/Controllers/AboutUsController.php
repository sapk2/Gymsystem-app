<?php

namespace App\Http\Controllers;

use App\Models\aboutus;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    
    public function index()
    {
        $aboutus=aboutus::first();
        return view('admin.aboutus.index',compact('aboutus'));
    }
   
    public function update(Request $request)
    {
        $validated =$request->validate([
            'title'=>'required',
            'description'=>'required',
            'email'=>'required',
            'image'=>'required',
            'subtitle'=>'required'
        ]);
        $aboutus = aboutus::first();
        if (!$aboutus) {
            $aboutus =new aboutus();
        }
        $aboutus->title =$validated['title'];
        $aboutus->description =$validated['description'];
        $aboutus->email=$validated['email'];
        $aboutus->subtitle=$validated['subtitle'];
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('aboutus', 'public');
            $aboutus->image = $imagepath;
        }
        
        $aboutus->save();
        return redirect()->back()->with('success', 'About Us updated successfully');

    }


}
