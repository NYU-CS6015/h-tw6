<html>
   <body>
    	@foreach ($tweets as $tweet)
        <p> User id: {{ $tweet->user_id}} </p>
    	  <p>Tweet: {{ $tweet->status }}</p>
        <br/>
    	@endforeach
   </body>
</html>
