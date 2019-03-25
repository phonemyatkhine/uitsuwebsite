@extends('layouts.app')
	@section('content')
		<form class="container" action="/clubs" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		  	@csrf
		    <label for="clubs">Clubs Name:</label>
		    <input type="text" class="form-control" id="clubs" name="name" placeholder="Clubs Name"> <br>
		    <label for="committees">Clubs Description:</label>
		    <input type="text" class="form-control" id="clubs" name="description" placeholder="Clubs Description(Optional)">
		    <label for="clubs">Clubs Founding Date:</label>
		    <input type="date" class="form-control" id="clubs" name="founding_date" placeholder="Founding Date"> <br>
		    <label>Committees Id:</label>
		    <select for="clubs" class="form-control" name="committees_id">
			    @foreach($committees as $committees)
			    <option class="form-control" value="{{$committees->id}}">{{$committees->name}}</option>
			    @endforeach 
			</select> <br>
		    <label for="clubs">Clubs Logo:</label>
		    <input type="file" class="form-control" id="clubs" name="logo"> <br>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection