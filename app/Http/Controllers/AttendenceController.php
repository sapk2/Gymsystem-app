<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance=attendance::all();
        return view('admin.attendances.index',compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attendance.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'date'=>'required',
            'check_in'=>'required',
            'check_out'=>'required',
            'status'=>'required'
        ]);
        attendance::create($data);
        return redirect()->route('admin.attendances.index')->with('sucess','data added sucessfully');
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
        $attendance=attendance::findorfail($id);
        return view('admin.attendances.index',compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'date'=>'required',
            'check_in'=>'required',
            'check_out'=>'required',
            'status'=>'required'
        ]);
        $attendance=attendance::findorfail($id);
        $attendance->update($data);
        return redirect()->route('admin.attendances.index')->with('sucess','sucessfully  update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        try {
            $attendance = attendance::findorfail($id);
            $attendance->delete();
            return redirect()->route('admin.attendances.index')->with('success', 'successfully deleted');
        } catch (\Exception $e) {
            return redirect()->route('admin.attendances.index')->with('error', 'Deletion failed: ' . $e->getMessage());
        }
    }

}
