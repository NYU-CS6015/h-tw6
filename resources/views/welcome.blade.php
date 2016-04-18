@extends('layouts.app')
<script type="text/javascript">
  function showDiv() {
     document.getElementById('tweet_box').style.display = "block";
  }
</script>
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
    @if (Auth::guest())

    @else
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <button class="btn btn-primary btn-large pull-right" onclick="showDiv();">New Tweet <i class="icon-white icon-pencil"></i></button>
            <br/>
            <br/>
            <br/>
          </div>
        </div>
        <div id ="tweet_box" class="row"  style="display:none;">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">What's happening</div>

                    <div class="panel-body">
                      <form method = "post" action ="/status/store">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" class="form-control" name="status"/>
                        <br/>
                        <br/>
                        <input type="submit" class="btn btn-primary btn-success pull-right" name="Post" value="Post"/>
                      </form>
                    </div>
                </div>
            </div>
        </div>
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">Who's tweeting now!!</div>
                  <div class="panel-body">
                    @foreach ($statuses as $status)
                    <div class="panel panel-default">
                      <div class="panel-heading"><p> {{ $status->user()->get()->pluck('name')->last() }} </p> </div>
                        <div class="panel-body">
                          {{$status->status}}
                        </div>
                        <div class="panel-footer">
                          <p class="text-right">{{ $status->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                  </div>
              </div>
          </div>
      </div>
    @endif
</div>
@endsection
