<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index() {
        // return view('pages.news.index')->with([
        //     'pageTitle' => 'News'
        // ]);
        $post = News::where('id', 1)->first();
        $status = \Auth::user()->can('hide', $post);
        var_dump($status);
    }
}
