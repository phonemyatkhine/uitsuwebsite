@extends('layouts.app')
	@section('content')
	<div class="container">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Description</th>
		      <th scope="col">Founding Date</th>
		      <th scope="col">Committees Id</th>
		      <th scope="col">Logo</th>
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
	  				{{$abc->description}}	
	  			</td>
	  			<td>
	  				{{$abc->founding_date}}	
	  			</td>
	  			<td>
	  				{{$abc->committees_id}}	
	  			</td>
	  			<td>
	  				<img src="eventsLogos/{{$abc->logo}}" style="width: 100px; height: 100px;">	  					
	  			</td>
  				<td>
	  				<form action="/events/{{$abc->id}}" method="GET">
	  					@csrf
	  					<input type="submit" class="btn btn-success" value="View">
	  				</form>
	  			</td>
  				<td>
			  		<form action="/events/{{$abc->id}}/edit" method="get">
			  			@csrf
			  				<input type="submit" class="btn btn-info" value="Edit">
			  		</form>
	  			</td>
	  			<td>
	  				<form action="/events/{{$abc->id}}" method="POST">
	  					@method('DELETE')
	  					@csrf
	  					<input type="submit" class="btn btn-danger" value="Delete">
	  				</form>
	  			</td>
		  	</tr>
			@endforeach
		  </tbody>
		</table>
		<a href="{{URL::to('/events/create')}}">Create events</a>
	</div>
		
	@endsection