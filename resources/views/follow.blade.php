<html>
   <body>
   		Follow your friends :
	    	@foreach ($follow as $user)
	        <p> User id: {{ $user->user_id}} </p>
	        <br/>
	    	@endforeach
   </body>
</html>
