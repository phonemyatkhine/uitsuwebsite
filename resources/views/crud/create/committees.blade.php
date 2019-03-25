@extends('crud.layouts.crud')
	@section('content')
		<form class="container pull-left" action="/crud/{{$table}}" method="POST">
		  <div class="form-group">
		  	@csrf
		    <label for="years">Committee Name:</label>
		    <input type="text" class="form-control"  name="committees_name" placeholder="Committee Name"> <br> <label for="years">Committee Description:</label>
		   	<input type="textarea" class="form-control"  name="committees_des" placeholder="Committee Description"> <br>
   			<input type="hidden" name="photo" value="1">
		  <button type="submit" class="btn btn-primary">Submit</button>
		  </div>
		</form>
	@endsection