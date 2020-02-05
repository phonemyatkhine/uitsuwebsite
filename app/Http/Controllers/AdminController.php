<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }
    public function index() {
        return view('pages.admin.index')->with([
            'users' => User::all()
        ]);
    }
    public function editUser(Request $request) {

        $user = User::where('id', $request->input('id'))->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->committee = $request->input('committee');
        $user->club = $request->input('club');
        $user->save();
        return "success";
    }
}
