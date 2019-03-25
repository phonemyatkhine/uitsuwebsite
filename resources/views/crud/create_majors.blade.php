@extends('layouts.crud')
	@section('content')
		<form class="container" action="/majors" method="POST">
		  <div class="form-group">

		  	@csrf
		    <label for="majors">Majors Name:</label>
		    <input type="text" class="form-control" id="majors" name="name" placeholder="Majors Name">
		    <label for="majors">Years :</label>
			<select class="form-control" name="yearsid">
			@foreach($years as $abc)
			  <option value="{{$abc->years_id}}" >{{$abc->years_name}}</option>
			@endforeach
			</select>		
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection