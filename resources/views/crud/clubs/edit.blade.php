
@extends('layouts.app')
	@section('content')
	<div class="container">
		<form method="POST" action="/clubs/{{$clubs->id}}/" enctype="multipart/form-data">
		  @method('PATCH')
		  @csrf
		  <div class="form-group">
		    <label for="id">clubs Id:</label>
		    <input type="number" class="form-control" id="clubs_id" name="id" aria-describedby="emailHelp" value="{{$clubs->id}}">
		    <small id="emailHelp" class="form-text text-muted">Do not edit the primary key unless it is very urgent.</small>
		  </div>
		  <div class="form-group">
		    <label for="clubs_name">Clubs Name:</label>
		    <input type="text" class="form-control" id="clubs_name" name="name" value="{{$clubs->name}}">
		  </div>
		  <div class="form-group">
		    <label for="clubs_name">Clubs Description:</label>
		    <input type="text" class="form-control" id="clubs_name" name="description" value="{{$clubs->description}}">
		  </div>
		  <div class="form-group">
		    <label for="clubs_name">Founding Date:</label>
		    <input type="date" class="form-control" id="clubs_name" name="founding_date" value="{{$clubs->founding_date}}">
		  </div>
		  <div class="form-group">
		    <label>Committees Id:</label>
		    <select for="clubs" class="form-control" name="committees_id">Committees Id:
			    @foreach($committees as $committees)
			    <option class="form-control" value="{{$committees->id}}">{{$committees->name}}</option>
			    @endforeach 
			</select> <br>
		  </div>
		  <div class="form-group">
		  	<img src="{{URL::asset('ClubsLogos/'.$clubs->logo)}}" style="width: 100px; height: 100px;">	  	 <br> <br>
		    <label for="clubs_name">Logo:</label>
		    <input type="file" class="form-control" id="clubs_name" name="logo" value="{{$clubs->description}}">
		  </div>
		  <button type="submit" class="btn btn-primary">Update</button>
		</form>		
	</div>
	@endsection