@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">You are Following</div>
            <div class="panel-body">
      	    	@foreach ($users as $user)
              <div class="panel panel-default">
                <div class="panel-body">
          	    	<form action="/unfollow" method="post">
          	        <p> User id: {{ $user->id}} <br/>
          	       	User name: {{ $user->name}} </p>
            		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            		    <input type="hidden" name="follower_id" value = "{{$user->id}}"></input>
            		    <input type="submit" value="UnFollow" class="btn btn-success btn-danger pull-right" name="UnFollow"></input>
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
