<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
'	<style>
	  body
	  {
		background-color: lightblue;
	  }
	</style>
</head>
<body>
	<form action='/status/store' method="post">
	<div class="form-group">
	<label> Status: </label>
	<p> Auth::user()->name </p>
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	<input  type="text" class = "form-control" name="status"/>
	</div>
	<br/> <br/>
	<input type="submit" name="Submit" class="btn btn-success"/> </center>
	</form>
</body>
</html>
