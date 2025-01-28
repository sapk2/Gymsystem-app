<?php

namespace App\Http\Controllers;

use App\Models\health;
use App\Models\User;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $health=health::all();
        //dd($health);
        return view('admin.healthstatus.index',compact('health'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::where('roles','member')->get();
        return view('admin.healthstatus.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'blood_group'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'blood_pressure'=>'required',
            'heart_rate'=>'required',
            'body_fat_percentage'=>'required',
            'notes'=>'required',
        ]);
        $heightInMeters=$data['height']/100;
        $data['bmi'] = $heightInMeters > 0 ? round($data['weight'] / ($heightInMeters * $heightInMeters), 2) : null;
        health::create($data);
        return redirect()->route('admin.healthstatus.index')->with('sucess','Data created sucessfully!!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $health=health::findorfail($id);
        //dd($health);
        return view('admin.healthstatus.show',compact('health'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $health=health::findorfail($id);
        $user=User::where('roles','member')->get();
        return view('admin.healthstatus.edit',compact('health','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'blood_group'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'blood_pressure'=>'required',
            'heart_rate'=>'required',
            'body_fat_percentage'=>'required',
            'notes'=>'required',
        ]);
        $heightInMeters=$data['height']/100;
        $data['bmi'] = $heightInMeters > 0 ? round($data['weight'] / ($heightInMeters * $heightInMeters), 2) : null;
        $health=health::findorfail($id);
        $health->update($data);
        return redirect()->route('admin.healthstatus.index')->with('sucess','Data updated sucessfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $health=health::findorfail($id);
        $health->delete();
        return redirect()->route('admin.healthstatus.index')->with('sucess','Data deleted sucessfully!!');
    }


    public function memberhealth(){
        $health =health::all();
        return view('trainers.memberhealth',compact('health'));
    }

}
