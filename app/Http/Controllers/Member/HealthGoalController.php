<?php
// app/Http/Controllers/Member/HealthGoalController.php
namespace App\Http\Controllers\Member;

use App\Models\HealthGoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\health;
use Illuminate\Support\Facades\Auth;

class HealthGoalController extends Controller
{
public function index()
{
    $goal = HealthGoal::where('user_id', Auth::id())->first();
    $latestHealth = health::where('user_id', Auth::id())->latest()->first(); // fetch latest record
    return view('members.health-goals.index', compact('goal', 'latestHealth'));
}


    public function update(Request $request)
    {
        $data = $request->validate([
            'target_weight' => 'nullable|numeric|min:1|max:300',
            'target_bmi' => 'nullable|numeric|min:10|max:50',
            'target_body_fat' => 'nullable|numeric|min:1|max:70',
        ]);

        $goal = HealthGoal::updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );

        return redirect()->back()->with('success', 'Goals updated successfully.');
    }
}
