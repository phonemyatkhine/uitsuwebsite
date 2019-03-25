@extends('layouts.app')
	@section('content')
		<form class="container" action="/organizers" method="POST">
		  <div class="form-group">
		  	@csrf
		    <label for="organizers">organizers Name:</label>
		    <input type="text" class="form-control" id="organizers" name="name" placeholder="organizers Name"> <br>
		    <label for="organizers">organizers Description:</label>
		    <input type="text" class="form-control" id="organizers" name="description" placeholder="organizers Description(Optional)">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection