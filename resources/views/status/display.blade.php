<html>
   <body>
    	@foreach ($tweets as $tweet)
        <p> {{ $tweet->user_id}} </p>
    	  <p>{{ $tweet->status }}</p>
        <br/>
    	@endforeach
   </body>
</html>
