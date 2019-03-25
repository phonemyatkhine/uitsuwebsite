@extends('layouts.app')
	@section('content')
		<form class="container" action="/committees" method="POST">
		  <div class="form-group">
		  	@csrf
		    <label for="committees">Committees Name:</label>
		    <input type="text" class="form-control" id="committees" name="name" placeholder="committees Name"> <br>
		    <label for="committees">Committees Description:</label>
		    <input type="text" class="form-control" id="committees" name="description" placeholder="Committees Description(Optional)">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection