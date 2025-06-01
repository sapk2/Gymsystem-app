<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrylogController extends Controller
{
    public function index(){

        $entrylogs=attendance::all();
        return view('Trainers.entrylogs.index', compact('entrylogs'));

    }
    public function create(){
        $user = User::where('roles', 'member')->get();
        return view('Trainers.entrylogs.create', compact('user'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'status' => 'required'
        ]);
        attendance::create($data);
        return redirect()->route('Trainers.entrylogs.index')->with('success', 'Data added successfully');
    }
    public function edit(string $id){
        $entrylog = attendance::findOrFail($id);
        $user = User::where('roles', 'member')->get();
        return view('Trainers.entrylogs.edit', compact('entrylog', 'user'));
    }
    public function update(Request $request, string $id){
        $data = $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'status' => 'required'
        ]);
        $entrylog = attendance::findOrFail($id);
        $entrylog->update($data);
        return redirect()->route('Trainers.entrylogs.index')->with('success', 'Successfully updated');
    }
    public function delete(string $id){
        try {
            $entrylog = attendance::findOrFail($id);
            $entrylog->delete();
            return redirect()->route('Trainers.entrylogs.index')->with('success', 'Successfully deleted');
        } catch (\Exception $e) {
            return redirect()->route('Trainers.entrylogs.index')->with('error', 'Failed to delete entry log');
        }
    }



    public function show(string $id)
    {
        $entrylog = attendance::findOrFail($id);
        return view('Trainers.entrylogs.show', compact('entrylog'));
    }

}
