<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserPaymentController extends Controller
{
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
            'payment_date' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'transaction_id' => 'required',
        ]);
        
        Payment::create($data);
        return redirect()->route('members.payments.index')->with('success', 'Payment has been created successfully');
    }

    public function initiate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'plan_id' => 'required|exists:plans,id'
        ]);
        
        $user = Auth::user();
        $plan = Plan::findOrFail($request->plan_id);
        $amount = $request->amount * 100; 
        $pid = uniqid();

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('KHALTI_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "return_url" => route('members.payment.success'),
                "website_url" => url('/'),
                "amount" => $amount,
                "purchase_order_id" => $pid,
                "purchase_order_name" => $plan->name,
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

        return back()->with('error', 'Failed to initiate Khalti payment.');
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
            switch ($responseBody['status']) {
                case 'Completed':
                    Payment::create([
                        'user_id' => Auth::id(),
                        'payment_date' => now(),
                        'amount' => $responseBody['total_amount'] / 100,
                        'payment_method' => 'Khalti',
                        'transaction_id' => $pidx,
                    ]);
                    return redirect()->route('members.payments.index')->with('success', 'Transaction successful.');
                case 'Expired':
                case 'User canceled':
                    return redirect()->route('members.payments.create')->with('error', 'Transaction failed.');
                default:
                    return redirect()->route('members.payments.create')->with('error', 'Transaction failed.');
            }
        }
        
        return redirect()->route('members.payments.create')->with('error', 'Transaction verification failed.');
    }
}
