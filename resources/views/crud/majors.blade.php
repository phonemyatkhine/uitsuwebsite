	@extends('layouts.crud')
	@section('content')
	<div class="container">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Major Id</th>
		      <th scope="col">Major Name</th>
		      <th scope="col">Year Id</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($majors as $abc)
		  	<tr>
		  		<td>{{$abc->majors_id}}</td>
		  		<td>{{$abc->majors_name}}</td>
		  		<td>{{$abc->years_id}}</td>
		  	</tr>
			@endforeach
		  </tbody>
		</table>
		<h5>
			<ul>
				<li>
					<a href="{{URL::to('/majors/create')}}">Create Majors</a>	
				</li>
			</ul>
		</h5>	
	</div>
		
	@endsection