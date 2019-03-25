
@extends('layouts.app')
	@section('content')
	<div class="container">
		<form method="POST" action="/organizers/{{$organizers->id}}/">
		  @method('PATCH')
		  @csrf
		  <div class="form-group">
		    <label for="id">organizers Id:</label>
		    <input type="number" class="form-control" id="organizers_id" name="id" aria-describedby="emailHelp" value="{{$organizers->id}}">
		    <small id="emailHelp" class="form-text text-muted">Do not edit the primary key unless it is very urgent.</small>
		  </div>
		  <div class="form-group">
		    <label for="organizers_name">organizers Name:</label>
		    <input type="text" class="form-control" id="organizers_name" name="name" value="{{$organizers->name}}">
		  </div>
		  <div class="form-group">
		    <label for="organizers_name">organizers Description:</label>
		    <input type="text" class="form-control" id="organizers_name" name="description" value="{{$organizers->description}}">
		  </div>
		  <button type="submit" class="btn btn-primary">Update</button>
		</form>		
	</div>
	@endsection