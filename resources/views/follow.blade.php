<html>
   <body>
   		Follow your friends :
	    	@foreach ($follow as $user)
	        <p> User id: {{ $user->id}} <br/>
	       	User name: {{ $user->name}} </p>
	       	<form action="/follow" method="post">
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <input type="submit" value="Follow"></input>
		   </form>
	        <br/>
	    	@endforeach

	    	<p> Number of followers you have: {{$followers}} </p>
   </body>
</html>
