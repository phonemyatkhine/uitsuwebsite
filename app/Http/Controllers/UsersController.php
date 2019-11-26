<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    public function index() {
        return view('pages.user.profile')->with([
            'pageTitle' => \Auth::user()->name,
            'user' => \Auth::user()
        ]);
    }
}
