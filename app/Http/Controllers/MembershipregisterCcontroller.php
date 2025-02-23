<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\payment;
use App\Models\plan;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipregisterCcontroller extends Controller
{
   
    public function index()
    {
        $mem = member::all();
        $user = User::where('roles','member')->get();
        $payment =payment::all();
        
        
        return view('admin.managemembers.index', compact('mem','user','payment'));
    }

    public function create()
    {
        $user = User::where('roles','member')->get();
        $plan = plan::all();
        $payment =payment::all();
        return view('admin.managemembers.create', compact('user','payment', 'plan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'city_name' => 'required',
            'state' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone_no' => 'required',
            'joining_date' => 'required',
            'expirydate' => 'required'
        ]);
        $payment = payment::where('user_id',$request->user_id)->latest()->first();
        if (!$payment) {
            return redirect()->back()->with('error','no payment found for this user');
        }
        $data['plan_id'] = $payment->plan_id;
        member::create($data);
        return redirect()->route('admin.managemembers.index')->with('sucess', 'Member has been registered !!');
    }

    public function show(string $id)
    {
        $mem=member::findorfail($id);
        $plan=plan::all();
        $mem = Member::with('plan')->get();
        return view('admin.managemembers.show',compact('mem','plan'));
    }

    public function edit(string $id)
    {
        $user = User::all();
        $plan = plan::all();
        $mem = member::findorfail($id);
        $payment =payment::all();
        return view('admin.managemembers.edit', compact('user', 'plan', 'payment','mem'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'city_name' => 'required',
            'state' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone_no' => 'required',
            'joining_date' => 'required',
            'expirydate' => 'required'
        ]);
        $payment = Payment::where('user_id', $request->user_id)->latest()->first();
        if (!$payment) {
            return redirect()->back()->with('error', 'No payment record found for this user.');
        }
        $data['plan_id'] = $payment->plan_id;
        $mem = member::findorfail($id);
        $mem->update($data);
        return redirect()->route('admin.managemembers.index')->with('sucess', 'Data has been updated sucessfully!!');
    }

    public function delete(string $id)
    {
        $mem = member::findorfail($id);
        
        $mem->delete();
        return redirect()->route('admin.managemembers.index')->with('sucess', 'Membership deleted sucessfully!!');
    }
}
