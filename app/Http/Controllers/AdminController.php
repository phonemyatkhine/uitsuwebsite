<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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

    public function addUser(Request $request) {
        $pwd = Str::random(8);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'committee' => $request->input('committee'),
            'club' => $request->input('club'),
            'password' => Hash::make($pwd)
        ]);
        Mail::to($request->input('email'))->send(new UserCreated($request->input('email'), $pwd));
        return "success";
    }

    public function delete(Request $request) {
        $user = User::where('id', $request->input('id'))->first();
        if($user != null) {
            $user->delete();
        }
        return back();
    }
}
