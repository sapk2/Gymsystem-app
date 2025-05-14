<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserPaymentController extends Controller
{   
    public $theplan;

    public function index()
    {
        $userPayments = Payment::where('user_id', Auth::id())->get();
        return view('members.payments.index', compact('userPayments'));
    }

    public function create()
    {
        $user = Auth::user();
        $plan = Plan::all();
        return view('members.payments.create', compact('user', 'plan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'plan_id'=>'required',
            'payment_date' => 'required',
            'amount' => 'required',
            'payment_method' => 'required'
        ]);

        Payment::create($data);
        //dd($data);
        return redirect()->route('members.payments.index')->with('success', 'Payment has been created successfully');
    }

    public function initiate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'plan_id' => 'required'
        ]);
    
        $user = Auth::user();
        $theplan = Plan::findOrFail($request->plan_id);
        $amount = $request->amount * 100;
        $pid = uniqid();
        Session::put('plan_id', $theplan->id);
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dev.khalti.com/api/v2/epayment/initiate/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "return_url" => route('members.payment.success'),
                "website_url" => url('http://127.0.0.1:8000/'),
                "amount" => $amount,
                "purchase_order_id" => $pid,
                "purchase_order_name" => $theplan->name,
                "customer_info" => [
                    "name" => $user->name,
                    "email" => $user->email,
                    "phone" => $user->phone,
                ]
            ]),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Key ' . env('KHALTI_LIVE_KEY'),
                'Content-Type: application/json',
            ),
        ));
    
        $response = curl_exec($curl);
        curl_close($curl);
        $responseBody = json_decode($response, true);
    
        if (isset($responseBody['payment_url'])) {
            return redirect($responseBody['payment_url']);
        }
    
        return back()->with('error', 'Payment initiation failed.');
    }

    public function verify(Request $request)
    {
        $pidx = $request->query('pidx');
    
        if (!$pidx) {
            return redirect()->route('members.payments.index')->with('error', 'Invalid transaction.');
        }
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/lookup/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(['pidx' => $pidx]),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Key ' . env('KHALTI_LIVE_KEY'),
                'Content-Type: application/json',
            ),
        ));
    
        $response = curl_exec($curl);
        curl_close($curl);
        $responseBody = json_decode($response, true);
    
        if (isset($responseBody['status'])) {
            $status = $responseBody['status'];
            $amount = $responseBody['total_amount'] / 100;
    
            // Retrieve plan from session
            $plan_id = Session::get('plan_id');
            $theplan = Plan::findOrFail($plan_id);
    
            Payment::create([
                'user_id' => Auth::id(),
                'plan_id' => $theplan->id,
                'payment_date' => Carbon::now(),
                'amount' => $amount,
                'payment_method' => 'Khalti',
                'transaction_id' => $pidx,
                'status' => $status,
            ]);
    
            Session::forget('plan_id'); // Clear session after use
    
            if ($status === 'Completed') {
                return redirect()->route('members.payments.index')->with('success', 'Transaction successful.');
            } elseif ($status === 'Expired' || $status === 'User canceled') {
                return redirect()->route('members.payments.create')->with('error', 'Transaction failed.');
            }
        }
    
        return redirect()->route('members.payments.create')->with('error', 'Transaction verification failed.');
    }
}
