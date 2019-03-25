<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
 
    public function index()
    {
        $data = tags::all();
        $model = new tags;
        return view('crud.tags.index',compact('data'));
    }

    public function create()
    {
        return view('crud.tags.create');
    }

    public function store(Request $request)
    {

        $tags = new tags;
        $tags->name = $request->name;
        $tags->save();

        return redirect('/tags');

    }

    public function show($id)
    {

        $tags = tags::where('id',$id)->first();
        return view('crud.tags.view',compact('tags'));

    }

    public function edit($id)
    {   
        
        $tags = tags::where('id',$id)->first();
        return view('crud.tags.edit',compact('tags'));

    }


    public function update(Request $request, $id)
    {   

        $new_id = $request->id;
        $name = $request->name;
        $tags = tags::find($id);
        if($new_id != $id) {
            $tags->id = $new_id;
        }
        $tags->name = $name;
        $tags->save();
        return redirect('/tags');
    }

    public function destroy($id)
    {
        $tags = tags::find($id);
        $tags->delete();
        return redirect('/tags');
    }
}
