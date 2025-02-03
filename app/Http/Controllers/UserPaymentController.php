<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userpayments = payment::where('user_id', Auth::id())->get();
        return view('members.payments.index', compact('userpayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('members.payments.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'payment_date' => 'required',
            'amount' => 'required|integer',
            'payment_method' => 'required',
            'transaction_id' => 'required',

        ]);
        payment::create($data);
        return redirect()->route('members.payments.index')->with('sucess', 'Payment has been created sucessfully');
    }

  
}
