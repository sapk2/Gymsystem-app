<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    
    public function index()
    {
        $routine=routine::all();
        return view('admin.routines.index',compact('routine'));
    }

    public function create()
    {
        $user=User::where('roles','trainer')->get();
        return view('admin.routines.create',compact('user'));
    }

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

    public function show(string $id)
    {
        $routine= routine::findorfail($id);
       
        return view('admin.routines.show',compact('routine'));
    }

    public function edit(string $id)
    {
        $routine=routine::findorfail($id);
        $user=User::where('roles','trainer')->get();
        return view('admin.routines.edit',compact('routine','user'));
    }

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
