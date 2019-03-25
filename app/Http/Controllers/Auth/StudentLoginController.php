<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class StudentLoginController extends Controller
{
    function showLoginForm () {
    	 return view('login');
    }

   	function login() {
   		return Request->all();

   	}
   	function register() {

   	}
}
