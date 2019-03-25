@extends('crud.layouts.crud')
	@section('index')
		<div class="container-fluid">
		<h2>{{$table}}</h2>
		<table class="table table-light" style="border-collapse: collapse; border: 3px solid black;" >
		  <thead style="background-color: #67a6ff; border-radius: 5px;">
		    <tr>
		    @for($i=0;$i<$count-2;$i++)
		      <th scope="col">{{$c_column[$i]}}</th>
		    @endfor
		      <th scope="col">View</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>

		  <tbody style="background-color: ">
		  	@foreach($data as $abc)
		  			<tr style=" border: 2px solid black;">
	  					
		  				@for($a=0;$a<$count-2;$a++)
		  				<td>
		  					{{$abc->{$columns[$a]} }}
		  				</td>
		  				@endfor
				  		<td>
			  				<form action="/{{$table}}/{{$abc->{$columns[0]} }}" method="GET">
			  					@csrf
			  					<input type="submit" class="btn btn-success" value="View">
			  				</form>
			  			</td>
		  				<td>
					  		<form action="/{{$table}}/{{$abc->{$columns[0]} }}/edit">
					  			@csrf
					  				<input type="submit" class="btn btn-info" value="Edit">
					  		</form>
			  			</td>
			  			<td>
			  				<form action="/crud/{{$table}}/{{$abc->{$columns[0]} }}" method="POST">
			  					@method('DELETE')
			  					@csrf
			  					<input type="submit" class="btn btn-danger" value="Delete">
			  				</form>
			  			</td>		
		  			</tr>
			@endforeach
		  </tbody>
		</table>
		<a href="/crud/{{$table}}/create">Create {{$table}}</a>
	</div>
		
	@endsection
