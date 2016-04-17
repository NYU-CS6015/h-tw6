@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                  Say hello to your twitter page.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <button class="btn btn-primary btn-large pull-right">New Tweet <i class="icon-white icon-pencil"></i></button>
          <br/>
          <br/>
          <br/>
        </div>
      </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Who's tweeting now!!</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
