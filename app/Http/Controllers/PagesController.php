<?php

namespace App\Http\Controllers;

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
}
