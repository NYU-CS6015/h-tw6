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
			if (Auth::check())
    	{
        	$userId = Auth::user()->id;
      }

			$followers = DB::table('followers')
						 ->where('user_id','=',$userId)
						 ->get();

		 $followersId = array();

		 foreach($followers as $follower){
			 $followersId[] = $follower->follow_id;
		 }

		}


     public function followUnfollow(Request $request)
    {
    	if (Auth::check())
    	{
        	$userId = Auth::user()->id;
        }

        if(($request->input('follow')) != null ){

    	$followId = $request->input('userId');
        #database query to insert the user to be followed
        $followUser = DB::table('followers')->insert(
    					array('user_id' => $userId,
          				'follow_id' => $followId)
    					);
    	}

    	if(($request->input('unfollow')) == true){
    		$unfollowId = $request->input('unfollowId');

        $whereArray = ['user_id' => $userId, 'follow_id' => $unfollowId];

        #database query to insert the user to be followed
        $unfollowUser = DB::table('followers')
        				->where($whereArray)
        				->delete();
    	}


        #current total followers
       $followers = DB::table('followers')
    					->where('user_id','=',$userId)
    					->get();

    	$followersId = array();

    	foreach($followers as $follower){
    		$followersId[] = $follower->follow_id;
    	}

    	#to get details of a follower from user table
    	$followersDetail = DB::table('users')
    					->whereIn('id',$followersId)
    					->get();

    	#recommendation to follow these users
        $follow = DB::table('users')
    					->whereNotIn('id',$followersId)
    					->get();

 			$followersCount = count($followersId);


    	if($follow){
    		return view('follow',['follow' => $follow, 'followersCount'=> $followersCount,'followersDetail' => $followersDetail]);
    	}

   }

}
