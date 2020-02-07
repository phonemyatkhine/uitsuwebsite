<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.home.index');
    }

    public function contact() {
        return view('pages.home.contact');
    }

    public function cec() {
        return view('pages.home.cec');
    }

    public function sendContactEmail(Request $request) {
        Mail::to('uitsu@uit.edu.mm')->send(new ContactEmail($request->input('name'), $request->input('email'), $request->input('subject'), $request->input('message')));
        return back()->with([
            "success" => "Contact email sent successfully"
        ]);
    }
}
