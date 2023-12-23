<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Log;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('contactUs');
    }

    public function show(){
        return view('contactUs');
    }
    
    public function submit(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
    
        // Create a new Contact model instance and fill it with the form data
        $contact = new \App\Models\Contact([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        $log = new Log();
        $log->username = Auth::user()->name;
        $log->ip = \Request::ip();
        $log->activity = $contact->name ." Sent a message ";
        $log->save();
    
        // Save the contact in the database
        $contact->save();
    
        return redirect()->route('showContact')->with('success', 'Your message has been sent successfully!');
    }
    
}
