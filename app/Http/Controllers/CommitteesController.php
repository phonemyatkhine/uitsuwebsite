<?php

namespace App\Http\Controllers;

use App\Committees;
use Illuminate\Http\Request;

class CommitteesController extends Controller
{
 
    public function index()
    {
        $data = committees::all();
        $model = new committees;
        return view('crud.committees.index',compact('data'));
    }

    public function create()
    {
        return view('crud.committees.create');
    }

    public function store(Request $request)
    {

        $committees = new committees;
        $committees->name = $request->name;
        $committees->description = $request->description;
        $committees->save();

        return redirect('/committees');

    }

    public function show($id)
    {

        $committees = committees::where('id',$id)->first();
        return view('crud.committees.view',compact('committees'));

    }

    public function edit($id)
    {   
        
        $committees = committees::where('id',$id)->first();
        return view('crud.committees.edit',compact('committees'));

    }


    public function update(Request $request, $id)
    {   

        $new_id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $committees = committees::find($id);
        if($new_id != $id) {
            $committees->id = $new_id;
        }
        $committees->name = $name;
        $committees->description = $description;
        $committees->save();
        return redirect('/committees');
    }

    public function destroy($id)
    {
        $committees = committees::find($id);
        $committees->delete();
        return redirect('/committees');
    }
}
