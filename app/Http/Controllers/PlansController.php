<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\payment;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PlansController extends Controller
{
    public function index()
    {
        $plan = Plan::all();
        return view('admin.plans.index', compact('plan'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

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
        $data['description'] = strip_tags($request->description);
        Plan::create($data);
        return redirect()->route('admin.plans.index')->with('success', 'Plan  created successfully.!.');
    }

    public function edit(string $id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, string $id)
    {
        $plan = Plan::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'validity' => 'required|integer|min:1',
             'rate'=>'required'
        ]);
        $data['amount'] = $data['validity'] * $data['rate'];
        $data['description'] = strip_tags($request->description);
        $plan->update($data);
        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully.!.');
    }

    public function delete(string $id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully.');
    }

    
}
