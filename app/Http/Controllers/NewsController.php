<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {
        $rawHidden = News::where('hidden', 1)->orderBy('created_at', 'desc')->get();
        $hidden = array();
        foreach($rawHidden as $tmp) {
            if(Auth::user()->can('unhide', $tmp)) {
                array_push($hidden, $tmp);
            }
        }
        return view('pages.news.index')->with([
            'pageTitle' => 'News',
            'news' => News::where('hidden', 0)->orderBy('created_at', 'desc')->get(),
            'hidden' => $hidden
        ]);
    }

    public function create() {
        return view('pages.news.create')->with([
            'pageTitle' => 'Post News'
        ]);
    }

    public function edit($id) {
        $news = News::where('id', $id)->first();
        return view('pages.news.edit')->with([
            'pageTitle' => 'Edit News',
            'news' => $news
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
            $news->cover_image = "storage/news/cover_image/".$filename;
        }
        $news->save();
        return redirect('/news');
    }

    public function update(Request $request) {
        $news = News::where('id', $request->input('id'))->first();
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
            $news->cover_image = "storage/news/cover_image/".$filename;
        }
        $news->save();
        return redirect('/news');
    }

    public function view($id) {
        $news = News::where('id', $id)->first();
        if(!$news->hidden || Auth::user()->can('unhide', $news)) {
            return view('pages.news.view')->with([
                'pageTitle' => $news->title,
                'news' => $news
            ]);
        }
    }

    public function hide(Request $request) {
        $news = News::where('id', $request->input('id'))->first();
        if(Auth::user()->can('hide', $news)) {
            $news->hidden = 1;
            $news->hidden_by = Auth::user()->id;
            $news->save();
        }
        return redirect('/news');
    }

    public function unhide(Request $request) {
        $news = News::where('id', $request->input('id'))->first();
        if(Auth::user()->can('unhide', $news)) {
            $news->hidden = 0;
            $news->hidden_by = 0;
            $news->save();
        }
        return redirect('/news');
    }

    public function delete(Request $request) {
        $news = News::where('id', $request->input('id'))->first();
        $news->delete();
        return redirect('/news');
    }
}