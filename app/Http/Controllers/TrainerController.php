<?php

namespace App\Http\Controllers;

use App\Models\trainer;
use App\Models\User;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * 
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer=trainer::all();
        return view('admin.managetrainers.index',compact('trainer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user =User::where('roles','trainer')->get();
        return view('admin.managetrainers.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'user_id'=>'required|unique:trainers,user_id',
            'specialization'=>'required',
            'phone_no'=>'required'
        ]);
        trainer::create($data);
        return redirect()->route('admin.managetrainers.index')->with('sucess','data created sucessfully');

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
        $user=User::where('roles','trainer')->get();
        $trainer =trainer::findorfail($id);
        return view('admin.managetrainers.edit',compact('trainer','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->validate([
            'user_id'=>'required',
            'specialization'=>'required',
            'phone_no'=>'required'
        ]);
        $trainer=trainer::findorfail($id);
        $trainer->update($data);
        return redirect()->route('admin.managetrainers.index')->with('sucess','sucessfully updated data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $trainer=trainer::findorfail($id);
        $trainer->delete();
        return redirect()->route('admin.managetrainers.index')->with('sucess','deleted sucessfully');
    }
}
