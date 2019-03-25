@extends('crud.layouts.crud')
	@section('content')
		<form class="container pull-left" action="/crud/{{$table}}" method="POST">
		  <div class="form-group">
		  	@csrf
		    <label for="years">Years Name:</label>
		    <input type="text" class="form-control" id="years" name="years_name" placeholder="Years Name"> <br> 	
		  <button type="submit" class="btn btn-primary">Submit</button>
		  </div>
		</form>
	@endsection