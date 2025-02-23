<?php

namespace App\Http\Controllers;

use App\Models\trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    public function index()
    {
        $trainer = trainer::all();
        return view('admin.managetrainers.index', compact('trainer'));
    }

    public function create()
    {
        $user = User::where('roles', 'trainer')->get();
        return view('admin.managetrainers.create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|unique:trainers,user_id',
            'specialization' => 'required',
            'phone_no' => 'required',
            'end_at' => 'required',
            'image' => 'nullable'

        ]);
        if ($request->hasFile('image')) {
            $imagepath=$request->file('image')->store('trainer','public');
            $data['image']=$imagepath;
        }
        trainer::create($data);
        return redirect()->route('admin.managetrainers.index')->with('sucess', 'Data created sucessfully');
    }

    public function edit(string $id)
    {
        $user = User::where('roles', 'trainer')->get();
        $trainer = trainer::findorfail($id);
        return view('admin.managetrainers.edit', compact('trainer', 'user'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'specialization' => 'required',
            'phone_no' => 'required',
            'end_at' => 'required',
            'image'=>'nullable'
        ]);
        $trainer = trainer::findorfail($id);
        if ($request->hasFile('image')) {
            if ($trainer->image) {
                storage::disk('public')->delete($trainer->image);
            }
            $imagepath=$request->file('image')->store('trainer','public');
            $data['image'] = $imagepath;
        }
        $trainer->update($data);
        return redirect()->route('admin.managetrainers.index')->with('sucess', 'Data updated sucessfully');
    }

    public function delete(string $id)
    {
        $trainer = trainer::findorfail($id);
        $trainer->delete();
        return redirect()->route('admin.managetrainers.index')->with('sucess', 'Data deleted sucessfully');
    }

    public function trainershow()
    {
        $trainer = trainer::where('user_id', Auth::id())->get();
        return view('trainers.membership.index', compact('trainer'));
    }


}
