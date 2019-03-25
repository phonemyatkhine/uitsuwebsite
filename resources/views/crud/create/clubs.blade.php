@extends('crud.layouts.crud')
	@section('content')
		<form class="container pull-left" action="/crud/{{$table}}" method="POST">
		  <div class="form-group">
		  	@csrf
		    <label for="years">Clubs Name:</label>
		    <input type="text" class="form-control" id="years" name="clubs_name" placeholder="Years Name"> <br> 	
		    <label for="years">Clubs Description:</label>
		    <input type="text" class="form-control" id="years" name="clubs_description" placeholder="Years Name"> <br> 	
		    <label for="years">Clubs Photo:</label>
		    <input type="file" class="form-control" id="years" name="clubs_photo" placeholder="Years Name"> <br> 	
		    <label for="years">Founding date:</label>
		    <input type="text" class="form-control" id="years" name="clubs_date" placeholder="Years Name"> <br> 	
		    <label for="years">Committee Id:</label>
		    <select class="form-control">
		    @foreach($committees_data as $cd)
    			<option value="{{$cd->committees_id}}">{{$cd->committees_name}}</option>
		    @endforeach
  			</select>
  			<br>
		  <button type="submit" class="btn btn-primary">Submit</button>
		  </div>
		</form>
	@endsection