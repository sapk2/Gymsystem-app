<?php

namespace App\Http\Controllers;

use App\Models\health;
use App\Models\User;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    
    public function index()
    {
        $health=health::all();
        return view('admin.healthstatus.index',compact('health'));
    }

    public function create()
    {
        $user=User::where('roles','member')->get();
        return view('admin.healthstatus.create',compact('user'));
    }

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

    public function show(string $id)
    {
        $health=health::findorfail($id);
        return view('admin.healthstatus.show',compact('health'));
    }

    public function edit(string $id)
    {
        $health=health::findorfail($id);
        $user=User::where('roles','member')->get();
        return view('admin.healthstatus.edit',compact('health','user'));
    }

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

    public function delete(string $id)
    {
        $health=health::findorfail($id);
        $health->delete();
        return redirect()->route('admin.healthstatus.index')->with('sucess','Data deleted sucessfully!!');
    }

   public function memberhealth(){
    $health = Health::all();
    $user = User::where('roles', 'member')->get();
    return view('Trainers.memberhealth', compact('health', 'user'));
}




}
