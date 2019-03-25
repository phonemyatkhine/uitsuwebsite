@extends('layouts.app')
	@section('content')
	<div class="container">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Clubs</th>
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
	  				{{$abc->email}}	
	  			</td>
	  			<td>
	  				{{$abc->club}}	
	  			</td>
  				<td>
	  				<form action="/organizers/{{$abc->id}}" method="GET">
	  					@csrf
	  					<input type="submit" class="btn btn-success" value="View">
	  				</form>
	  			</td>
  				<td>
			  		<form action="/organizers/{{$abc->id}}/edit" method="get">
			  			@csrf
			  				<input type="submit" class="btn btn-info" value="Edit">
			  		</form>
	  			</td>
	  			<td>
	  				<form action="/organizers/{{$abc->id}}" method="POST">
	  					@method('DELETE')
	  					@csrf
	  					<input type="submit" class="btn btn-danger" value="Delete">
	  				</form>
	  			</td>
		  	</tr>
			@endforeach
		  </tbody>
		</table>
		<a href="{{URL::to('/organizers/create')}}">Create organizers</a>
	</div>
		
	@endsection