<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\contact;
use App\Models\health;
use App\Models\member;
use App\Models\payment;
use App\Models\plan;
use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminindex()
    {
        $usercount = User::count();
        $attendances = Attendance::count();
        $member = Member::count();
        $payment = Payment::count();
        $contacts=contact::count();
      //  dd($contacts);
        // Get user login count per month
        $monthlyLogins = User::selectRaw('MONTH(created_at) as month, COUNT(id) as count')
            ->whereYear('created_at', date('Y')) // Filter by current year
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Fill missing months with 0
        $months = range(1, 12);
        $loginCounts = array_map(fn($m) => $monthlyLogins[$m] ?? 0, $months);

        return view('admin.dashboard', compact(
            'usercount',
            'attendances',
            'member',
            'payment',
            'loginCounts',
            'contacts'
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function trainerindex()
    {
        $routine = routine::count();

        return view('trainers.dashboard', compact('routine'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function memberindex()
    {
        $user = Auth::user();
        
        return view('members.dashboard', [
            'plan' => Plan::all(),
            'health' => Health::where('user_id', $user->id)
                            ->latest()
                            ->get(),
            'latestHealth' => Health::where('user_id', $user->id)
                                 ->latest()
                                 ->first(),
            'user' => $user
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
