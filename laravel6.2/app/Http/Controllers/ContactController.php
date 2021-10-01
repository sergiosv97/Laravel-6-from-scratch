<?php

namespace App\Http\Controllers;
//use App\Mail\ContactMe;
//use Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view ('contact');
    }

    public function store()
    {
        // Log::info('ingresa');
        request()->validate(['email'=> 'required|email']);
        
        //Log::info('ingresa mail');
      //  Mail::raw('it works!', function ($message){
       //     $message->to(request('email'))
       //     ->subject('hello there');
      //  });
        Mail::to(request('email'))
          //   ->send(new ContactMe('shirts'));
          ->send(new Contact());

        return redirect('/contact')
         ->with('message','email sent!');
    }
}
