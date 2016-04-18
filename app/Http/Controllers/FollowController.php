<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Follow;

class FollowController extends Controller
{
    //
	public function followers()
    {
    	if (Auth::check())
			{
        	$userId = Auth::user()->id;
      }
			$followers = User::find($userId)->follows()->get();
    	if($followers){
    		return view('follow.my_followers',['followers' => $followers]);
    	}
    }

		public function canFollow()
		{
			if(Auth::check())
			{
				$userId = Auth::user()->id;
			}
			$followers = User::find($userId)->follows()->get()->pluck('follower_id');
			$users = User::whereNotIn('id',$followers)->where('id','<>', $userId)->get();
			return view('follow.followers',['users' => $users]);
		}

		public function follow(Request $request)
		{
			if(Auth::check())
			{
				$userId = Auth::user()->id;
			}
			$new_follower = new Follow(['follower_id' => $request->input('follower_id')]);
			User::find($userId)->follows()->save($new_follower);
			return redirect('/follow');
		}

		public function following()
		{
			if(Auth::check())
			{
				$userId = Auth::user()->id;
			}
			$following = User::find($userId)->follows()->get()->pluck('follower_id');
			$users = User::whereIn('id', $following)->get();
			return view('follow.following', ['users' => $users]);
		}

		public function unfollow(Request $request)
		{
			if(Auth::check())
			{
				$userId = Auth::user()->id;
			}
			$follower = Follow::where(['user_id' => $userId, 'follower_id' => $request->input('follower_id')]);
			$follower->delete();
			return redirect('/following');
		}

		public function myfollowers()
		{
			if(Auth::check())
			{
				$userId = Auth::user()->id;
			}
			$myFollowers = Follow::where('follower_id', $userId)->get()->pluck('user_id');
			$users = User::whereIn('id', $myFollowers);
			return view('follow.my_followers', ['users' => $users]);
		}
}
