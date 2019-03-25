
@extends('layouts.app')
	@section('content')
	<div class="container">
		<form method="POST" action="/years/{{$years->id}}/">
		  @method('PATCH')
		  @csrf
		  <div class="form-group">
		    <label for="id">Years Id:</label>
		    <input type="number" class="form-control" id="years_id" name="id" aria-describedby="emailHelp" value="{{$years->id}}">
		    <small id="emailHelp" class="form-text text-muted">Do not edit the primary key unless it is very urgent.</small>
		  </div>
		  <div class="form-group">
		    <label for="years_name">Years Name:</label>
		    <input type="text" class="form-control" id="years_name" name="name" value="{{$years->name}}">
		  </div>
		  <button type="submit" class="btn btn-primary">Update</button>
		</form>		
	</div>
	@endsection