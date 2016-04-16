<html>
   <body>
	    	@foreach ($follow as $user)
	    	@if ($user->id != Auth::user()->id)
	    	Follow your friends :
	        <p> User id: {{ $user->id}} <br/>
	       	User name: {{ $user->name}} </p>
	       	<form action="/follow" method="post">
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		     <input type="hidden" name="userId" value = "{{$user->id}}"></input>
		    <input type="submit" value="Follow"></input>
		   </form>
	        <br/>
	        @endif
	    	@endforeach

	    	<p> Number of followers you have: {{$followersCount}} </p>
	    	<br/>
	    	<br/>
	    	<br/>

	    	@if($followersDetail)
		    	@foreach ($followersDetail as $user)
		        <p> User id: {{ $user->id}} <br/>
		       	User name: {{ $user->name}} </p>
		       	<form action="/follow" method="post">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <input type="hidden" name="userId" value = "{{$user->id}}"></input>
			    <input type="submit" value="UnFollow"></input>
			   </form>
		        <br/>
		    @endforeach
		    @endif
	    	
	    	
   </body>
</html>
