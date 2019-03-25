
@extends('layouts.app')
	@section('content')
	<div class="container">
		<form method="POST" action="/majors/{{$majors->id}}/">
		  @method('PATCH')
		  @csrf
		  <div class="form-group">
		    <label for="id">Majors Id:</label>
		    <input type="number" class="form-control" id="majors_id" name="id" aria-describedby="emailHelp" value="{{$majors->id}}">
		    <small id="emailHelp" class="form-text text-muted">Do not edit the primary key unless it is very urgent.</small>
		  </div>
		  <div class="form-group">
		    <label for="majors_name">Majors Name:</label>
		    <input type="text" class="form-control" id="majors_name" name="name" value="{{$majors->name}}">
		  </div>
		  <div class="form-group">
		    <label for="majors">Years Id:</label> <br>
		    <select class="form-control" name="years_id">
		    	@foreach($years as $years)
		    	<option class="form-control" value="{{$years->id}}">{{$years->name}}</option>
		    	@endforeach
		    </select>
		  </div>
		</form>		
	</div>
	@endsection