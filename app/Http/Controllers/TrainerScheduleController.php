<?php

namespace App\Http\Controllers;

use App\Models\health;
use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routine=routine::where('user_id',Auth::id())->get();
        $user =User::all();
        
        return view('trainers.routines.index',compact('routine','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $data=$request->validate([
            'exercise_name'=>'required',
            'day_of_week'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);
        routine::create($data);
        return redirect()->route('trainer.routines.index')->with('sucess','Routine created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $routine=routine::findorfail($id);
        return view('trainers.routines.edit',compact('routine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            
            'exercise_name'=>'required',
            'day_of_week'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);
        $routine=routine::findorfail($id);
        $routine->update($data);
        return redirect()->route('trainers.routines.index')->with('sucess','Data updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $routine=routine::all();
        $routine->delete();
        return redirect()->route('trainers.routines.index')->with('sucess','Routine deleted sucessfully');
    }


}
