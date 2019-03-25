<?php

namespace App\Http\Controllers;

use App\Majors;
use Illuminate\Http\Request;
use App\Years;

class MajorsController extends Controller
{
   public function index()
    {
        $data = Majors::all();
        $model = new Majors;
        return view('crud.majors.index',compact('data'));
    }

    public function create()
    {   
        $years = Years::all();
        return view('crud.majors.create',compact('years'));
    }

    public function store(Request $request)
    {

        $majors = new Majors;
        $majors->name = $request->name;
        $majors->years_id = $request->years_id;
        $majors->save();

        return redirect('/majors');

    }

    public function show($id)
    {

        $years = Years::all();
        $majors = Majors::where('id',$id)->first();
        return view('crud.majors.view',compact('majors','years'));

    }

    public function edit($id)
    {   
        $years = Years::all();
        $majors = Majors::where('id',$id)->first();
        return view('crud.majors.edit',compact('majors','years'));

    }


    public function update(Request $request, $id)
    {   

        $new_id = $request->id;
        $name = $request->name;
        $years_id = $request->years_id;

        $majors = Majors::find($id);
        if($new_id != $id) {
            $majors->id = $new_id;
        }
        $majors->name = $name;
        $majors->years_id = $years_id;

        $majors->save();
        return redirect('/majors');
    }

    public function destroy($id)
    {
        $majors = Majors::find($id);
        $majors->delete();
        return redirect('/majors');
    }
}
