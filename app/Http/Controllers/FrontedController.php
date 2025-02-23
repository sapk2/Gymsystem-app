<?php

namespace App\Http\Controllers;

use App\Models\Frontedcontent;
use Illuminate\Http\Request;

class FrontedController extends Controller
{
    
    public function index()
    {
        $hero=Frontedcontent::first();
        return view('admin.herofeature.index',compact('hero'));
    }
    public function update(Request $request)
    {
        $validated=$request->validate([
            'image'=>'required',
            'tagline'=>'required',
            'heading'=>'required',
            'startlink'=>'required',
            'feature_title'=>'required',
            'feature_offer'=>'required',
            'feature_link'=>'required',
            'hours_week'=>'required',
            'hours_sat'=>'required',
            'status'=>'required',
        ]);
        $hero=Frontedcontent::first();
        if (!$hero) {
            $hero =new Frontedcontent();
        }
        $hero->tagline =$validated['tagline'];
        $hero->heading =$validated['heading'];
        $hero->startlink =$validated['startlink'];
        $hero->feature_title =$validated['feature_title'];
        $hero->feature_offer=$validated['feature_offer'];
        $hero->feature_link =$validated['feature_link'];
        $hero->hours_week =$validated['hours_week'];
        $hero->hours_sat =$validated['hours_sat'];
        $hero->status =$validated['status'];
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('','public');
            $hero->image=$imagepath;
        }
        $hero->save();
        return redirect()->back()->with('success', 'Header updated successfully');

    }
}
