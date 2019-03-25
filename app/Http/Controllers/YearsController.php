<?php

namespace App\Http\Controllers;

use App\Years;
use Illuminate\Http\Request;

class YearsController extends Controller
{

    public function index()
    {
        $data = Years::all();
        $model = new Years;
        return view('crud.years.index',compact('data'));
    }

    public function create()
    {
        return view('crud.years.create');
    }

    public function store(Request $request)
    {

        $years = new Years;
        $years->name = $request->name;
        $years->save();

        return redirect('/years');

    }

    public function show($id)
    {

        $years = Years::where('id',$id)->first();
        return view('crud.years.view',compact('years'));

    }

    public function edit($id)
    {   
        
        $years = Years::where('id',$id)->first();
        return view('crud.years.edit',compact('years'));

    }


    public function update(Request $request, $id)
    {   

        $new_id = $request->id;
        $name = $request->name;
        $years = Years::find($id);
        if($new_id != $id) {
            $years->id = $new_id;
        }
        $years->name = $name;
        $years->save();
        return redirect('/years');
    }

    public function destroy($id)
    {
        $years = Years::find($id);
        $years->delete();
        return redirect('/years');
    }
}
