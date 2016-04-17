<html>
   <body>

   			Follow your friends :
   			
	    	@foreach ($follow as $user)
	    	@if ($user->id != Auth::user()->id)
	    	<form action="/follow" method="post">
	        <p> User id: {{ $user->id}} <br/>
	       	User name: {{ $user->name}} </p>
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		     <input type="hidden" name="userId" value = "{{$user->id}}"></input>
		    <input type="submit" value="Follow" name="follow"></input>
	        <br/>
	        @endif
	    	@endforeach

	    	<p> Number of followers you have: {{$followersCount}} </p>
	    	<br/>
	    	<br/>
	    	<br/>

	    	@if($followersDetail)
	    	<form action="/follow" method="post">
		    	@foreach ($followersDetail as $follower)
		        <p> Follower id: {{ $follower->id}} <br/>
		       	Follower name: {{ $follower->name}} </p>
		       	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <input type="hidden" name="unfollowId" value = "{{$follower->id}}"></input>
			    <input type="submit" value="Unfollow" name ="unfollow"></input>
			   </form>
		        <br/>
		    @endforeach
		    @endif	    	
   </body>
</html>
