<?php

namespace App\Http\Controllers;
use App\Models\payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments=payment::all();
            return view('admin.payments.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::where('roles','member')->get();
        return view('admin.payments.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
        'user_id'=>'required',
        'payment_date'=>'required',
        'amount'=>'required|integer',
        'payment_method'=>'required',
        'transaction_id'=>'required',
        'status'=>'required'
        ]);
        payment::create($data);
        return redirect()->route('admin.payments.index')->with('sucess','Payment has been created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payments=payment::findorfail($id);
      //  dd($payments);
        return view('admin.payments.show',compact('payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payments=payment::findorfail($id);
        $user=User::where('roles','member')->get();
        return view('admin.payments.edit',compact('payments','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'user_id'=>'required',
            'payment_date'=>'required',
            'amount'=>'required',
            'payment_method'=>'required',
            'transaction_id'=>'required',
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


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $payment=payment::findorfail($id);
        $payment->delete();
        return redirect()->route('admin.payments.index')->with('sucess','Payment has been deleted sucessfully ');
    }
 
}
