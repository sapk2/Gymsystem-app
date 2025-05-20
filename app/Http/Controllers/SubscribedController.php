<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\member;
use Illuminate\Support\Facades\Auth;

class SubscribedController extends Controller
{
    public function memberplan(){
    $member = member::where('user_id', Auth::id())->first();
    return view('members.subscribedplan', compact('member'));
}


public function renew($id)
{
    $member = Member::findOrFail($id);

    // Add 30 days to the current expiry date
    $member->expirydate = Carbon::parse($member->expirydate)->addDays(30);

    // Optionally reset joining date to now (can be removed if not needed)
    $member->joining_date = now();

    $member->save();

    return redirect()->back()->with('success', 'Subscription renewed for 30 days!');
}

}
