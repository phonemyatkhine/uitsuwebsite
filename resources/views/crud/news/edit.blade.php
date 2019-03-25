
@extends('layouts.app')
	@section('content')
	<div class="container">
		<form method="POST" action="/committees/{{$committees->id}}/">
		  @method('PATCH')
		  @csrf
		  <div class="form-group">
		    <label for="id">Committees Id:</label>
		    <input type="number" class="form-control" id="committees_id" name="id" aria-describedby="emailHelp" value="{{$committees->id}}">
		    <small id="emailHelp" class="form-text text-muted">Do not edit the primary key unless it is very urgent.</small>
		  </div>
		  <div class="form-group">
		    <label for="committees_name">Committees Name:</label>
		    <input type="text" class="form-control" id="committees_name" name="name" value="{{$committees->name}}">
		  </div>
		  <div class="form-group">
		    <label for="committees_name">Committees Description:</label>
		    <input type="text" class="form-control" id="committees_name" name="description" value="{{$committees->description}}">
		  </div>
		  <button type="submit" class="btn btn-primary">Update</button>
		</form>		
	</div>
	@endsection