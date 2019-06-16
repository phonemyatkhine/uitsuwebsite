<?php

namespace App\Http\Controllers;

use App\Organizers;
use App\User;
use Illuminate\Http\Request;

class OrganizersController extends Controller
{
  
    public function index()
    {
        $data = organizers::all();
        $model = new organizers;
        return view('crud.organizers.index',compact('data'));
    }

    public function create()
    {
        return view('crud.organizers.create');
    }

    public function store(Request $request)
    {

        $organizers = new organizers;
        $organizers->name = $request->name;
        $organizers->email = User::where('name', $request->name)->first()->email;
        $organizers->password = User::where('name', $request->name)->first()->password;
        $organizers->save();

        return redirect('/organizers');

    }

    public function show($id)
    {

        $organizers = organizers::where('id',$id)->first();
        return view('crud.organizers.view',compact('organizers'));

    }

    public function edit($id)
    {   
        
        $organizers = organizers::where('id',$id)->first();
        return view('crud.organizers.edit', compact('organizers'));

    }


    public function update(Request $request, $id)
    {   

        $new_id = $request->id;
        $name = $request->name;
        $organizers = organizers::find($id);
        if($new_id != $id) {
            $organizers->id = $new_id;
        }
        $organizers->name = $name;
        $organizers->save();
        return redirect('/organizers');
    }

    public function destroy($id)
    {
        $organizers = organizers::find($id);
        $organizers->delete();
        return redirect('/organizers');
    }
}
