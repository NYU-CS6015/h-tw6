<html>
   <body>
    	@foreach ($tweets as $tweet)
    	  <p>{{ $tweet->status }}</p>
        <br/>
    	@endforeach
   </body>
</html>
