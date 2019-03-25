@extends('layouts.app')
	@section('content')
		<form class="container" action="/years" method="POST">
		  <div class="form-group">
		  	@csrf
		    <label for="years">Years Name:</label>
		    <input type="text" class="form-control" id="years" name="name" placeholder="Years Name">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection