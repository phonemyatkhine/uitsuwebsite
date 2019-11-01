<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index() {
        return view('pages.news.index')->with([
            'pageTitle' => 'News'
        ]);
    }

    public function create() {
        return view('pages.news.create')->with([
            'pageTitle' => 'Post News'
        ]);
    }

    public function upload(Request $request) {
        $ext = $request->file('media')->getClientOriginalExtension();
        $filename = sha1(time()).'.'.$ext;
        $request->file('media')->storeAs('public/news', $filename);
        return json_encode(['location' => asset('storage/news/'.$filename)]);
    }
}
