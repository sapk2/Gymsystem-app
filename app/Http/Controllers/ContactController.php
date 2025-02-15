<?php

namespace App\Http\Controllers;

use App\Mail\replymail;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */// Display the contact form
    public function contact()
    {
        return view('partial.contact');
    }

    public function store(Request $request)
    {
       $request->validate([
        'name'=>'required',
        'email'=>'required',
        'message'=>'required'
       ]);
       contact::create($request->all());
       return redirect()->route('welcome')->with('sucess','you message has been send');
       
    }


    public function show()
    {
        $contacts=contact::all();
        return view('admin.contacts.index',compact('contacts'));
    }
    public function reply($id){
        $contacts=contact::findorfail($id);
        return view('admin.contacts.reply',compact('contacts'));
    }
    public function destroy($id){
        $contacts =contact::findorfail($id);
        $contacts->delete();
        return redirect()->route('admin.contacts.index')->with('sucess','Message deleted successfully');
    }
    public function sendReply(Request $request){
      $request->validate([
        'to'=>'required',
        'subject'=>'required',
        'reply'=>'required'
      ]);
      try {
        $mailData =[
          'subject'=>$request->subject,
          'message'=>$request->reply,
        ];    Mail::to($request->to)->send(new replymail($mailData));
      } catch (\Exception $e) {
        Log::error('mail sending failed: ' . $e->getMessage());
      }
      return redirect()->back()->with('success', 'Reply sent successfully');
      return back()->with('error', 'Failed to send email. Please try again.');
    }
}

