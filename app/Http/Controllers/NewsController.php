<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Auth;

class NewsController extends Controller
{
    public function index() {
        return view('pages.news.index')->with([
            'pageTitle' => 'News',
            'news' => News::where('hidden', 0)->orderBy('created_at', 'desc')->get()
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

    public function store(Request $request) {
        $news = new News;
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->content = $request->input('content');
        $news->tag = $request->input('tag');
        $news->club = $request->input('club');
        $news->committee = $request->input('committee');
        $news->owner = Auth::user()->id;
        if($request->hasFile('cover_image')) {
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$ext;
            $request->file('cover_image')->storeAs('public/news/cover_image', $filename);
            $news->cover_image = "storage/news/".$filename;
        }
        $news->save();
        return redirect('/news');
    }
}
