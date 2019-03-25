<!DOCTYPE html>
<html>
<head>
	<title>CRUD Layout</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<style type="text/css">
		.pull-left {
			float: left;
		}
		.pull-right{
			float: right;
		}
		.h100{
			height: 100em;
			padding: 0px; 
			background-color:#212529;
			overflow: hidden;
		}
	    html, body {
	        height: 100%;
	        margin: 0px;
    	}
	</style>
</head>
<body>
	<div >
		<div class="col-lg-2 col-sm-12 pull-left" style="padding: 0px;">
			<h3 class="btn-success" style="margin: 0px; padding: 1em; background-color: #354758; height: 3em;">Admin Panel</h3>
		</div>
		<div class="col-sm-12 col-lg-10 pull-left" style="padding: 0px;">
			<h3  style="margin: 0px; padding: 1em; height: 3em;" ><span class="pull-right" style="font-size: 15px"><a href="">Login</a></span></h3>
		</div>
		<div class="col-lg-2 col-sm-12 pull-left h100" style=" ">
			<table class="table table-dark">
		  		<tbody>
					@foreach($tables as $table)
						<tr>
							<td>
								<a href="/crud/{{$table}}" style="color: white;">
									Manage {{$table}}
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-sm-12 col-md-8 pull-left" style="padding: 0px;">
			@yield('index')
		</div>
	</div>
	@yield('content')

</body>
</html>