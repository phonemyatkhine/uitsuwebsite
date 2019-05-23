<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Events;
use App\EventsPhotos;


class NewsController extends Controller
{
  public function index()
    {
        $data = events::all();
        $photo = eventsphotos::all();
        return view('crud.events.index',compact('data','photo'));
    }

    public function create()
    {
        $tags = tags::all();
        $clubs = clubs::all();
        return view('crud.events.create',compact('tags','clubs'));
    }

    public function store(Request $request)
    {
        $events = new events;


        $events->name = $request->name;
        $events->description = $request->description;
        $events->date = $request->date;
        //$events->time = $request->start_time." to ".$request->end_time;
        $events->time = "9:00";
        $events->tags_id = $request->tags_id;
        $events->clubs_id = $request->clubs_id;

        $events->save();

        $photo_count = $request->photo_count;
        for ($i=0; $i <=$photo_count-1 ; $i++) {
                    $events_photos = new EventsPhotos;
                    if(Input::hasFile('photo')) {
                        $files = Input::file('photo');
                        $photo = $files[$i];
                        $events_photos->events_id = $events->id;
                        $photo->move('eventsPhotos', $photo->getClientOriginalName());
                        $events_photos->photo = $photo->getClientOriginalName();
                        $events_photos->save();
                    } else {
                        return back()->with('danger','Files Upload has errors.');
                    }
                }

        return redirect('/events');

    }

    public function show($id)
    {

        $events = events::where('id',$id)->first();
        return view('crud.events.view',compact('events'));

    }

    public function edit($id)
    {

        $events = events::where('id',$id)->first();
         $committees = committees::all();
        return view('crud.events.edit',compact('events','committees'));

    }


    public function update(Request $request, $id)
    {

        $new_id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $founding_date = $request->founding_date;
        $committees_id = $request->committees_id;
        $logo = $request->logo;

        $events = events::find($id);
        if($new_id != $id) {
            $events->id = $new_id;
        }
        if($logo != $events->logo) {
            $image_path = 'eventsLogos/'.$events->logo;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            if(Input::hasFile('logo')) {
                $logo = Input::file('logo');
                $logo->move('eventsLogos', $logo->getClientOriginalName());
                $events->logo = $logo->getClientOriginalName();
            }
        }
        $events->name = $name;
        $events->description = $description;
        $events->founding_date = $founding_date;
        $events->committees_id = $committees_id;
        $events->save();
        return redirect('/events');
    }

    public function destroy($id)
    {
        $events = events::find($id);
        $events->delete();
        return redirect('/events');
    }
}
