<html>
   <body>
   		Follow your friends :
	    	@foreach ($follow as $user)
	        <p> User id: {{ $user->id}} <br/>
	       	User name: {{ $user->name}} </p>
	       	<form action="/follow" method="post">
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		     <input type="hidden" name="userId" value = "{{$user->id}}"></input>
		    <input type="submit" value="Follow"></input>
		   </form>
	        <br/>
	    	@endforeach

	    	@if($followersCount != '')
	    	<p> Number of followers you have: {{$followersCount}} </p>
	    	@endif
   </body>
</html>
