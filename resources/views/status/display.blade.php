<html>
   <body>
    	@foreach ($tweets as $tweet)
        <p> {{ App\User::find($tweet->user_id)->name}} </p>
    	  <p>{{ $tweet->status }}</p>
        <br/>
    	@endforeach
   </body>
</html>
