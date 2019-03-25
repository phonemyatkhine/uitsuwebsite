@extends('layouts.app')
	@section('content')
	<div class="container">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Years Id</th>		    	
		      <th scope="col">View</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>

		  	@foreach($data as $abc)
		  	<tr>		  			
	  			<td>
	  				{{$abc->id}}
	  			</td>
	  			<td>
	  				{{$abc->name}}	
	  			</td>
	  			<td>
	  				{{$abc->years->id}}	
	  			</td>
  				<td>
	  				<form action="/majors/{{$abc->id}}" method="GET">
	  					@csrf
	  					<input type="submit" class="btn btn-success" value="View">
	  				</form>
	  			</td>
  				<td>
			  		<form action="/majors/{{$abc->id}}/edit" method="get">
			  			@csrf
			  				<input type="submit" class="btn btn-info" value="Edit">
			  		</form>
	  			</td>
	  			<td>
	  				<form action="/majors/{{$abc->id}}" method="POST">
	  					@method('DELETE')
	  					@csrf
	  					<input type="submit" class="btn btn-danger" value="Delete">
	  				</form>
	  			</td>
		  	</tr>
			@endforeach
		  </tbody>
		</table>
		<a href="{{URL::to('/majors/create')}}">Create Majors</a>
	</div>
		
	@endsection