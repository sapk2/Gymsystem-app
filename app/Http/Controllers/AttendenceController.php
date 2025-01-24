<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = attendance::all();
        return view('admin.attendances.index', compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('roles', 'member')->get();
        return view('admin.attendances.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'status' => 'required'
        ]);
        attendance::create($data);
        return redirect()->route('admin.attendances.index')->with('sucess', 'data added sucessfully');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = attendance::findorfail($id);
        $user = User::where('roles', 'member')->get();
       // dd($user);
        return view('admin.attendances.edit', compact('attendance', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'status' => 'required'
        ]);
        $attendance = attendance::findorfail($id);
        $attendance->update($data);
        return redirect()->route('admin.attendances.index')->with('sucess', 'sucessfully  update');
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
