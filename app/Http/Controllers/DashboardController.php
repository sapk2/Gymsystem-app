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
    
    public function adminindex()
    {
        $usercount = User::count();
        $attendances = Attendance::count();
        $member = Member::count();
        $payment = Payment::count();
        $contacts=contact::count();
        $faq=contact::all();
        //dd($faq);
        // Get user login count per month
        $monthlyLogins = User::selectRaw('MONTH(created_at) as month, COUNT(id) as count')
            ->whereYear('created_at', date('Y')) 
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
            'faq',
            'loginCounts',
            'contacts'
        ));
    }

    public function trainerIndex()
    {
        $totalMembers = User::where('roles', 'member')->count();
        $totalRoutines = Routine::count();
        $presentMembers = Attendance::where('status', 'Present')->count();
        $absentMembers = $totalMembers - $presentMembers;
        $attendanceData = Attendance::whereNotNull('check_in')
            ->selectRaw('DATE(date) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('total', 'date');
        $demoTable = Attendance::latest()->take(10)->get();
        $attendancePercentage = $totalMembers > 0 ? round(($presentMembers / $totalMembers) * 100, 2) : 0;
        return view('Trainers.dashboard', compact(
            'totalMembers',
            'totalRoutines',
            'attendanceData',
            'presentMembers',
            'absentMembers',
            'demoTable',
            'attendancePercentage',
            
        ));
    }

    public function memberindex()
    {
        $user = Auth::user();
        return view('members.dashboard', [
            'plan' => Plan::all(),
            'health' => Health::where('user_id', $user->id)
                            ->latest()
                            ->get(),
            'latestHealth' => Health::where('user_id', $user->id)->latest()->first(),
            'user' => $user
        ]);
    }


}
