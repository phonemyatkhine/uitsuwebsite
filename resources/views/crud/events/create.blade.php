@extends('layouts.app')
	@section('content')
		<form class="container" action="/events" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		  	@csrf
		    <label for="events">Events Name:</label>
		    <input type="text" class="form-control" id="events" name="name" placeholder="Event Name"> <br>
		    <label for="committees">Events Description:</label>
		    <input type="text" class="form-control" id="events" name="description" placeholder="Event Description(Optional)">
		    <label for="events">Events Date:</label>
		    <input type="date" class="form-control col-lg-2" id="events" name="date" placeholder="Event Date"> <br>
		    <label for="events">Events Time:</label>
		    <input type="time" class="form-control col-lg-2" name="start_time"> to
		    <input type="time" class="form-control col-lg-2" name="end_time">
		    <label>Tags:</label> <br>
				<input type="text" name="tags" id="tags" value="" class="form-control"> <br>
		    <select for="events" class="form-control" name="tags_id" id="tags_name">
		    	<option value="">No Tag</option>
			    @foreach($tags as $tags)
			    <option class="form-control" value="{{$tags->name}}">{{$tags->name}}</option>
			    @endforeach
			</select> <br>
			<div class="addtag btn btn-info">Add Tag</div> <br> <br>
			<label>Clubs Id:</label>
		    <select for="events" class="form-control" name="clubs_id">
		    	<option value="">No Club</option>
			    @foreach($clubs as $clubs)
			    <option class="form-control" value="{{$clubs->id}}">{{$clubs->name}}</option>
			    @endforeach
			</select> <br>
			<div class="addphoto btn btn-info">Add Photo</div> <br> <br>
			<div class="photos">
				<label for="events">Events Photo:</label>
				<input  type='hidden' class='photo_count' name='photo_count'> <br>
			</div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<script type="text/javascript">
			$(document).ready(function(){
				var pcount = 1;
				var tcount = 1;
			  $(".addphoto").click(function(){
			  	var box = "<input  type='file' class='form-control' name='photo[]' ><br>";
			  	if(pcount<=6) {
			  		console.log(box);
			    	 $(".photos").append(box);
			    	 $(".photo_count").val(pcount);
			    	 pcount ++;
			  	}
			  });
				$(".addtag").click(function(){
					alert($("#tags").val());
					alert($("#tags_name").val());
					if($("#tags").val()==="") {
						$("#tags").val($('#tags_name').val());
					} else if(($("#tags").val()).indexOf($("#tags_name").val())) {
						alert("Tag already choosen.");
					} else {
						$("#tags").val($('#tags').val()+", "+$('#tags_name').val());
					}
				});
			});
		</script>
	@endsection
