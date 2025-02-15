<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routine=routine::all();
        return view('admin.routines.index',compact('routine'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::where('roles','trainer')->get();
        return view('admin.routines.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'exercise_name'=>'required',
            'day_of_week'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);
        routine::create($data);
        return redirect()->route('admin.routines.index')->with('sucess','Routine created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $routine= routine::findorfail($id);
       
        return view('admin.routines.show',compact('routine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $routine=routine::findorfail($id);
        $user=User::where('roles','trainer')->get();
        return view('admin.routines.edit',compact('routine','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'exercise_name'=>'required',
            'day_of_week'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);
        $routine=routine::findorfail($id);
        $routine->update($data);
        return redirect()->route('admin.routines.index')->with('sucess','Data updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $routine=routine::findorfail($id);
        $routine->delete();
        return redirect()->route('admin.routines.index')->with('sucess','Routine deleted sucessfully');
    }

/*******************************Memeber dashboard********************************************************************************************* */
    public function memberindex(){
        $routine=routine::all();

        return view('members.routine.memberindex',compact('routine'));
    }
}
