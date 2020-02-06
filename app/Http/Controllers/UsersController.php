<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public function showProfile($id)
    {
        $user = User::where('id', $id)->first();
        if($user != null) {
            return view('pages.user.profile')->with([
                'pageTitle' => $user->name,
                'user' => $user
            ]);
        } else {
            abort(404);
        }

    }
    public function passwd(Request $request) {
        $request->validate([
            'current' => ['required', new MatchOldPassword],
            'password' => ['required', 'confirmed'],
        ]);
        User::where('id', \Auth::user()->id)->first()->update(['password'=> Hash::make($request->password)]);
        return back();
    }

    public function updateInfo(Request $request) {
        $messages = [
            'student_id.regex' => 'It\'s not seemed to be a valid one :")',
        ];
        $request->validate([
            'name' => ['required'],
            'student_id' => ['nullable', 'string', 'regex:/^[A-Za-z]{2,3}-\d+/i'],
        ], $messages);
        $user = User::where('id', \Auth::user()->id)->first();
        $user->update([
            'name' => $request->input('name'),
            'student_id' => $request->input('student_id'),
            'biography' => $request->input('bio'),
            'phone_number' => $request->input('phone_number')
        ]);
        return back();
    }

    public function updateProfilePicture(Request $request) {
        //echo json_encode($request->input('image'));
        $image = $request->input('image');
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10).'.'.'jpeg';
        $path = Storage::put('public/profile_pictures/'.$imageName, base64_decode($image));
        $status = User::where('id', \Auth::user()->id)->first()->update([
            'profile_picture' => 'storage/profile_pictures/'.$imageName
        ]);
        if($status) {
            return "success";
        }
    }
}
