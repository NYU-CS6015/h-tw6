@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">People on Twitter</div>
            <div class="panel-body">
      	    	@foreach ($users as $user)
              <div class="panel panel-default">
                <div class="panel-body">
          	    	<form action="/new_follow" method="post">
          	        <p> User id: {{ $user->id}} <br/>
          	       	User name: {{ $user->name}} </p>
            		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            		    <input type="hidden" name="follower_id" value = "{{$user->id}}"></input>
            		    <input type="submit" value="Follow" class="btn btn-success btn-large pull-right" name="Follow"></input>
            	      <br/>
          	      </form>
                </div>
              </div>
              @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
