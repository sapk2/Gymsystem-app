<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plan = Plan::all();
        return view('admin.plans.index', compact('plan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'validity' => 'required|integer|min:1',
            'rate'=>'required'
        ]);


        do {
            $data['plan_id'] = strtoupper(Str::random(8));
        } while (Plan::where('plan_id', $data['plan_id'])->exists());

        $data['amount'] = $data['validity'] * $data['rate'];

        Plan::create($data);

        return redirect()->route('admin.plans.index')->with('success', 'Plan  created successfully.!.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plan = Plan::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'validity' => 'required|integer|min:1',
             'rate'=>'required'
        ]);

        // Recalculate amount
        $data['amount'] = $data['validity'] * $data['rate'];

        $plan->update($data);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully.!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully.');
    }

    public function memberplan(){
        $member =member::where('user_id', Auth::id())->get();
      // dd($member);
        return view('members.subscribedplan',compact('member'));
    }
}
