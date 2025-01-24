<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\plan;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipregisterCcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mem = member::all();
        $user = User::where('roles','member')->get();
        
        return view('admin.managemembers.index', compact('mem','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('roles','member')->get();
        $plan = plan::all();
        return view('admin.managemembers.create', compact('user', 'plan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'plan_id' => 'required',
            'city_name' => 'required',
            'state' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone_no' => 'required',
            'joining_date' => 'required',
            'expirydate' => 'required'
        ]);
        member::create($data);
        return redirect()->route('admin.managemembers.index')->with('sucess', 'Member has been registered !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mem=member::findorfail($id);
        $plan=plan::all();
        $mem = Member::with('plan')->get();
        return view('admin.managemembers.show',compact('mem','plan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::all();
        $plan = plan::all();
        $mem = member::findorfail($id);
        return view('admin.managemembers.edit', compact('user', 'plan', 'mem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'plan_id' => 'required',
            'city_name' => 'required',
            'state' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone_no' => 'required',
            'joining_date' => 'required',
            'expirydate' => 'required'
        ]);
        $mem = member::findorfail($id);
        $mem->update($data);
        return redirect()->route('admin.managemembers.index')->with('sucess', 'Data has been updated sucessfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $mem = member::findorfail($id);
        
        $mem->delete();
        return redirect()->route('admin.managemembers.index')->with('sucess', 'Membership deleted sucessfully!!');
    }
}
