
@extends('layouts.app')
	@section('content')
	<div class="container">
		<form method="POST" action="/tags/{{$tags->id}}/">
		  @method('PATCH')
		  @csrf
		  <div class="form-group">
		    <label for="id">Tags Id:</label>
		    <input type="number" class="form-control" id="tags_id" name="tags_id" aria-describedby="emailHelp" value="{{$tags->id}}">
		    <small id="emailHelp" class="form-text text-muted">Do not edit the primary key unless it is very urgent.</small>
		  </div>
		  <div class="form-group">
		    <label for="tags_name">Tags Name:</label>
		    <input type="text" class="form-control" id="tags_name" name="tags_name" value="{{$tags->name}}">
		  </div>
		</form>		
	</div>
	@endsection