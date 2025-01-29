<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\member;
use App\Models\payment;
use App\Models\User;
use Illuminate\Http\Request;

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
        'usercount', 'attendances', 'member', 'payment', 'loginCounts'
    ));
}


    /**
     * Show the form for creating a new resource.
     */
    public function trainerindex()
    {
        
        return view('trainers.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function memberindex()
    {
        return view('members.dashboard');
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
