
@extends('layouts.app')
	@section('content')
	<div class="container">
		<form method="POST" action="/events/{{$events->id}}/" enctype="multipart/form-data">
		  @method('PATCH')
		  @csrf
		  <div class="form-group">
		    <label for="id">events Id:</label>
		    <input type="number" class="form-control" id="events_id" name="id" aria-describedby="emailHelp" value="{{$events->id}}">
		    <small id="emailHelp" class="form-text text-muted">Do not edit the primary key unless it is very urgent.</small>
		  </div>
		  <div class="form-group">
		    <label for="events_name">events Name:</label>
		    <input type="text" class="form-control" id="events_name" name="name" value="{{$events->name}}">
		  </div>
		  <div class="form-group">
		    <label for="events_name">events Description:</label>
		    <input type="text" class="form-control" id="events_name" name="description" value="{{$events->description}}">
		  </div>
		  <div class="form-group">
		    <label for="events_name">Founding Date:</label>
		    <input type="date" class="form-control" id="events_name" name="founding_date" value="{{$events->founding_date}}">
		  </div>
		  <div class="form-group">
		    <label>Committees Id:</label>
		    <select for="events" class="form-control" name="committees_id">Committees Id:
			    @foreach($committees as $committees)
			    <option class="form-control" value="{{$committees->id}}">{{$committees->name}}</option>
			    @endforeach 
			</select> <br>
		  </div>
		  <div class="form-group">
		  	<img src="{{URL::asset('eventsLogos/'.$events->logo)}}" style="width: 100px; height: 100px;">	  	 <br> <br>
		    <label for="events_name">Logo:</label>
		    <input type="file" class="form-control" id="events_name" name="logo" value="{{$events->description}}">
		  </div>
		  <button type="submit" class="btn btn-primary">Update</button>
		</form>		
	</div>
	@endsection