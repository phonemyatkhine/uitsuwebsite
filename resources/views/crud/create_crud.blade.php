@extends('crud.layouts.crud')
	@section('content')
		<form class="container pull-left" action="/crud/{{$table}}" method="POST">
		  	@csrf
		  	 <?php $k=0; ?>
		  	 @if(!empty($another))
			  	@for($i=0;$i<$count-2;$i++)

			  		<?php if(!empty($another['a_columns_positions'][$k])){$a = ($another['a_columns_positions'][$k]);} ?>
			  		@if($i == $a)
						<div class="form-group">
								 	
					     	<label>{{$c_column[$i]}}</label>
								 <select class="form-control">

								    <option></option>
								    	
								  </select>
					    	<!-- <input type="text" class="form-control" id="years" name="{{$columns[$i]}}" placeholder=""> 	 -->
						</div>
				  		<?php $k++; ?>
					@else 
						<div class="form-group">
					     	<label>{{$c_column[$i]}}</label>
					    	<input type="text" class="form-control" id="years" name="{{$columns[$i]}}" placeholder=""> 	
						</div>
					@endif
			    @endfor		
		  	 @endif
			
		  <!-- <div class="form-group">
		    <label for="years">Years Name:</label>
		    <input type="text" class="form-control" id="years" name="name" placeholder="Years Name">
		  </div> -->
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection