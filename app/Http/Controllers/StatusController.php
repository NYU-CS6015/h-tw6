<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Status;
use App\User;
class StatusController extends Controller
{
    public function create()
    {
      return view('status.create');
    }
    public function store(Request $request)
    {
      if(Auth::check())
			{
				$userId = Auth::user()->id;
			}
      $new_status = new Status;
      $new_status->status = $request->input('status');
      $new_status->user_id = $userId;
      $new_status->save();
      return redirect('/');
    }

    public function view()
    {
      $tweets = Status::all();
      return view('status.display', ['tweets' => $tweets]);
    }

    public function myFeed()
    {
      if (Auth::check())
			{
        	$userId = Auth::user()->id;
          $followers = User::find($userId)->follows()->get()->pluck('follower_id');
          $statuses = Status::whereIn('user_id', $followers)->orderBy('created_at', 'desc')->get();
          return view('welcome',['statuses' => $statuses]);
      }
      return view('welcome');

    }
}
