<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use Auth;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'view']);
    }

    public function index() {
        $rawHidden = Events::where('hidden', 1)->orderBy('created_at', 'desc')->get();
        $hidden = array();
        foreach($rawHidden as $tmp) {
            if(Auth::user()->can('unhide', $tmp)) {
                array_push($hidden, $tmp);
            }
        }
        return view('pages.events.index')->with([
            'pageTitle' => 'Events',
            'events' => Events::where('hidden', 0)->orderBy('created_at', 'desc')->get(),
            'hidden' => $hidden
        ]);
    }

    public function create() {
        return view('pages.events.create')->with([
            'pageTitle' => 'Post Events'
        ]);
    }

    public function edit($id) {
        $events = Events::where('id', $id)->first();
        if(Auth::user()->can('edit', $events)) {
            return view('pages.events.edit')->with([
                'pageTitle' => 'Edit Events',
                'events' => $events
            ]);
        } else {
            return back();
        }
    }

    public function upload(Request $request) {
        $ext = $request->file('media')->getClientOriginalExtension();
        $filename = sha1(time()).'.'.$ext;
        $request->file('media')->storeAs('public/events', $filename);
        return json_encode(['location' => asset('storage/events/'.$filename)]);
    }

    public function store(Request $request) {
        $events = new Events;
        $events->title = $request->input('title');
        $events->description = $request->input('description');
        $events->start = $request->input('start');
        $events->end = $request->input('end');
        $events->location = $request->input('location');
        $events->content = $request->input('content');
        $events->tag = $request->input('tag');
        $events->club = $request->input('club');
        $events->committee = $request->input('committee');
        $events->owner = Auth::user()->id;
        if($request->hasFile('cover_image')) {
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$ext;
            $request->file('cover_image')->storeAs('public/events/cover_image', $filename);
            $events->cover_image = "storage/events/cover_image/".$filename;
        }
        $events->save();
        return redirect('/events');
    }

    public function update(Request $request) {
        $events = Events::where('id', $request->input('id'))->first();
        $events->title = $request->input('title');
        $events->description = $request->input('description');
        $events->start = $request->input('start');
        $events->end = $request->input('end');
        $events->location = $request->input('location');
        $events->content = $request->input('content');
        $events->tag = $request->input('tag');
        $events->club = $request->input('club');
        $events->committee = $request->input('committee');
        $events->owner = Auth::user()->id;
        if($request->hasFile('cover_image')) {
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$ext;
            $request->file('cover_image')->storeAs('public/events/cover_image', $filename);
            $events->cover_image = "storage/events/cover_image/".$filename;
        }
        $events->save();
        return redirect('/events');
    }

    public function view($id) {
        $events = Events::where('id', $id)->first();
        if(!$events->hidden || Auth::user()->can('unhide', $events)) {
            return view('pages.events.view')->with([
                'pageTitle' => $events->title,
                'events' => $events
            ]);
        }
    }

    public function hide(Request $request) {
        $events = Events::where('id', $request->input('id'))->first();
        if(Auth::user()->can('hide', $events)) {
            $events->hidden = 1;
            $events->hidden_by = Auth::user()->id;
            $events->save();
        }
        return redirect('/events');
    }

    public function unhide(Request $request) {
        $events = Events::where('id', $request->input('id'))->first();
        if(Auth::user()->can('unhide', $events)) {
            $events->hidden = 0;
            $events->hidden_by = 0;
            $events->save();
        }
        return redirect('/events');
    }

    public function delete(Request $request) {
        $events = Events::where('id', $request->input('id'))->first();
        if(Auth::user()->can('delete', $events)) {
            $events->delete();
        }
        return redirect('/events');
    }
}