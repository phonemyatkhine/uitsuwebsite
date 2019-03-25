@extends('layouts.app')
	@section('content')
		<form class="container" action="/majors" method="POST">
		  <div class="form-group">
		  	@csrf
		    <label for="majors">Majors Name:</label>
		    <input type="text" class="form-control" id="majors" name="name" placeholder="Majors Name"> <br>
		    <label for="majors">Years Id:</label> <br>
		    <select class="form-control" name="years_id">
		    	@foreach($years as $years)
		    	<option class="form-control" value="{{$years->id}}">{{$years->name}}</option>
		    	@endforeach
		    </select>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection