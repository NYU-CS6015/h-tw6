<html>
   <body>
   		Follow your friends :
	    	@foreach ($follow as $user)
	        <p> User id: {{ $user->id}} <br/>
	       	User name: {{ $user->name}} </p>
	        <br/>
	    	@endforeach
   </body>
</html>
