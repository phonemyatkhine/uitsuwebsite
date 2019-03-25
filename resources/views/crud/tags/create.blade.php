@extends('layouts.app')
	@section('content')
		<form class="container" action="/tags" method="POST">
		  <div class="form-group">
		  	@csrf
		    <label for="tags">Tags Name:</label>
		    <input type="text" class="form-control" id="tags" name="name" placeholder="Tags Name">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection