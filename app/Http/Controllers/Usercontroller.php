<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'roles' => 'required'
        ]);
        User::create($data);
        return redirect()->route('admin.users.index')->with('sucess', 'users created sucessfully');
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
        $user = User::findorfail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'roles' => 'required'
        ]);
        $user = User::findorfail($id);
        $user->update($data);
        $user->save();
        return redirect()->route('admin.users.index', compact('user'))->with('sucess', 'users updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('sucess', ' uses deleted sucessfully');
    }
}
