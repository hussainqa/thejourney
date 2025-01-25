<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscription;
class subscriptionController extends Controller
{
    public function sub(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $sub =new subscription;
        $sub->name = $validateData['name'];
        $sub->phoneNumber = $validateData['phoneNumber'];
        $sub->email = $validateData['email'];
        $sub->subject = $validateData['subject'];
        $sub->message = $validateData['message'];
        $sub->save();

         return redirect()->back()->with('success', 'your message,here');  
    }
}
