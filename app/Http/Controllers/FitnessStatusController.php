<?php

namespace App\Http\Controllers;

use App\Models\health;
use App\Models\User;
use Illuminate\Http\Request;

class FitnessStatusController extends Controller
{
public function index(){
    $status = health::all();
    return view('Trainers.status.index', compact('status'));    
}

public function create(){
    $user = User::where('roles', 'member')->get();
    return view('Trainers.status.create', compact('user')); 
}

public function store(Request $request){
    $data = $request->validate([
        'user_id' => 'required',
        'blood_group' => 'required',
        'height' => 'required',
        'weight' => 'required',
        'blood_pressure' => 'required',
        'heart_rate' => 'required',
        'body_fat_percentage' => 'required',
        'notes' => 'required',
    ]);
    $heightInMeters = $data['height'] / 100;
    $data['bmi'] = $heightInMeters > 0 ? round($data['weight'] / ($heightInMeters * $heightInMeters), 2) : null;

    health::create($data);
    return redirect()->route('Trainers.status.index')->with('success', 'Data created successfully!!');
}

public function edit($id){
    $status = health::findOrFail($id);
    $user = User::where('roles', 'member')->get();
    return view('Trainers.status.edit', compact('status', 'user'));
}

public function update(Request $request, $id){
    $data = $request->validate([
        'user_id' => 'required',
        'blood_group' => 'required',
        'height' => 'required',
        'weight' => 'required',
        'blood_pressure' => 'required',
        'heart_rate' => 'required',
        'body_fat_percentage' => 'required',
        'notes' => 'required',
    ]);
    $heightInMeters = $data['height'] / 100;
    $data['bmi'] = $heightInMeters > 0 ? round($data['weight'] / ($heightInMeters * $heightInMeters), 2) : null;

    $health = health::findOrFail($id);
    $health->update($data);
    return redirect()->route('Trainers.status.index')->with('success', 'Data updated successfully!!');
}

public function delete($id){
    $status = health::findOrFail($id);
    $status->delete();
    return redirect()->route('Trainers.status.index')->with('success', 'Data deleted successfully!!');
}

public function show(string $id){
    $status = health::findOrFail($id);
    return view('Trainers.status.show', compact('status'));
}


}
