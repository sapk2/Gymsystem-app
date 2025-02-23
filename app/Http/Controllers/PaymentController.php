<?php

namespace App\Http\Controllers;
use App\Models\payment;
use App\Models\plan;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   
    public function index()
    {
        $payments=payment::all();
            return view('admin.payments.index',compact('payments'));
    }

    public function create()
    {
        $user=User::where('roles','member')->get();
        $plans =plan::all();
        return view('admin.payments.create',compact('user','plans'));
    }

    public function store(Request $request)
    {
        $data=$request->validate([
        'user_id'=>'required',
        'plan_id'=>'required',
        'payment_date'=>'required',
        'amount'=>'required|integer',
        'payment_method'=>'required',
        'transaction_id' => 'nullable|unique:payments,transaction_id',
        'status'=>'required'
        ]);
        payment::create($data);
        return redirect()->route('admin.payments.index')->with('sucess','Payment has been created sucessfully');
    }

    public function show(string $id)
    {
        $payments=payment::findorfail($id);
        return view('admin.payments.show',compact('payments'));
    }

    public function edit(string $id)
    {
        $payment=payment::findorfail($id);
        $user=User::where('roles','member')->get();
        $plans=plan::all();
        return view('admin.payments.edit',compact('payment','plans','user'));
    }

    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'plan_id'=>'required',
            'payment_date'=>'required',
            'amount'=>'required',
            'payment_method'=>'required',
            'status'=>'required'
        ]);
        payment::findorfail($id)->update($data);
        return redirect()->route('admin.payments.index')->with('sucess','Payment has been updated sucessfully');
    }
    public function userupdate(Request $request, Payment $payment)
    { 
        $request->validate(['status' => 'required|string']);
        $payment->update(['status' => $request->status]);
        return back()->with('success', 'Payment status updated.');
    }

    public function delete(string $id)
    {
        $payment=payment::findorfail($id);
        $payment->delete();
        return redirect()->route('admin.payments.index')->with('sucess','Payment has been deleted sucessfully ');
    }
}
