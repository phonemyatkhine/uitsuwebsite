<?php

namespace App\Http\Controllers;

use App\Clubs;
use App\Committees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;

class ClubsController extends Controller
{
   public function index()
    {
        $data = clubs::all();
        $model = new clubs;
        return view('crud.clubs.index',compact('data'));
    }

    public function create()
    {
        $committees = committees::all();
        return view('crud.clubs.create',compact('committees'));
    }

    public function store(Request $request)
    {

        $clubs = new clubs;
        $clubs->name = $request->name;
        $clubs->description = $request->description;
        $clubs->founding_date = $request->founding_date;
        $clubs->committees_id = $request->committees_id;

        if(Input::hasFile('logo')) {
            $logo = Input::file('logo');
            $logo->move('ClubsLogos', $logo->getClientOriginalName());
            $clubs->logo = $logo->getClientOriginalName();
        } else {
            return back();
        }
        $clubs->save();

        return redirect('/clubs');

    }

    public function show($id)
    {

        $clubs = clubs::where('id',$id)->first();
        return view('crud.clubs.view',compact('clubs'));

    }

    public function edit($id)
    {   
        
        $clubs = clubs::where('id',$id)->first();
         $committees = committees::all();
        return view('crud.clubs.edit',compact('clubs','committees'));

    }


    public function update(Request $request, $id)
    {   

        $new_id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $founding_date = $request->founding_date;
        $committees_id = $request->committees_id;
        $logo = $request->logo;

        $clubs = clubs::find($id);
        if($new_id != $id) {
            $clubs->id = $new_id;
        }
        if($logo != $clubs->logo) {
            $image_path = 'ClubsLogos/'.$clubs->logo;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            if(Input::hasFile('logo')) {
                $logo = Input::file('logo');
                $logo->move('ClubsLogos', $logo->getClientOriginalName());
                $clubs->logo = $logo->getClientOriginalName();
            }
        }
        $clubs->name = $name;
        $clubs->description = $description;
        $clubs->founding_date = $founding_date;
        $clubs->committees_id = $committees_id;
        $clubs->save();
        return redirect('/clubs');
    }

    public function destroy($id)
    {
        $clubs = clubs::find($id);
        $clubs->delete();
        return redirect('/clubs');
    }
}

