<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\ContactForm;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sendEmail(Request $request) {
      Mail::send(new ContactForm($request->all()));

      return redirect()->route('contact');
    }

    public function contact(){
      return view('contact');
    }
}
