@extends('crud.layouts.crud')
	@section('content')
	<div class="container">
		<table class="table">
		@foreach($data as $data)
		{$attributes = array_keys($abc->getOriginal())}
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Year Name</th>
		      <th scope="col">View</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>

		  	@foreach($years as $abc)
		  	<?php $attributes = array_keys($abc->getOriginal())?>
		  	@dd($attributes)
		  	<tr>		  			
	  			<td>
	  				{{$abc->years_id}}
	  			</td>
	  			<td>
	  				{{$abc->years_name}}	
	  			</td>
  				<td>
	  				<form action="/years/{{$abc->years_id}}" method="GET">
	  					@csrf
	  					<input type="submit" class="btn btn-success" value="View">
	  				</form>
	  			</td>
  				<td>
			  		<form action="/years/{{$abc->years_id}}/edit">
			  			@csrf
			  				<input type="submit" class="btn btn-info" value="Edit">
			  		</form>
	  			</td>
	  			<td>
	  				<form action="/years/{{$abc->years_id}}" method="POST">
	  					@method('DELETE')
	  					@csrf
	  					<input type="submit" class="btn btn-danger" value="Delete">
	  				</form>
	  			</td>
		  	</tr>
			@endforeach
		  </tbody>
		</table>
		<a href="{{URL::to('/years/create')}}">Create Years</a>
	</div>
		
	@endsection