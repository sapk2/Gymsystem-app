<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();
        return view('admin.footer.index', compact('footer'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'map_heading' => 'required',
            'location' => 'required',
            'link' => 'required',
            'content' => 'required',
            'copyright'=>'required',
            'date'=>'required',
            'describe'=>'required'
        ]);
        $footer =Footer::first();
        if (!$footer) {
            $footer=new Footer();
        }
        $footer->map_heading=$validated['map_heading'];
        $footer->location=$validated['location'];
        $footer->link=$validated['link'];
        $footer->content=$validated['content'];
        $footer->copyright=$validated['copyright'];
        $footer->date=$validated['date'];
        $footer->describe=$validated['describe'];
        $footer->save();
        return redirect()->back()->with('sucess','created footer sucessfully');

    }
}
