<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class FollowerController extends Controller
{
    //
	public function follow()
    {
    	if (Auth::check())
		{
        	$userId = Auth::user()->id;
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
    		return view('follow',['follow' => $follow, 'followers' => $followers,'followersCount'=> $followersCount]);
    	}
    }

     public function followUser(Request $request)
    {
    	if (Auth::check())
    	{
        	$userId = Auth::user()->id;
        }
        $followId = $request->input('userId');

        #database query to insert the user to be followed 
        $followUser = DB::table('followers')->insert(
    					array('user_id' => $userId,
          				'follow_id' => $followId)
    					);

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
    		return view('follow',['follow' => $follow, 'followersCount'=> $followersCount,'followers' => $followers]);
    	}
    	
    }

    public function unfollowUser(Request $request)
    {
    	if (Auth::check())
    	{
        	$userId = Auth::user()->id;
        }
        $unfollowId = $request->input('userId');

        $whereArray = ['user_id' => $userId, 'follow_id' => $unfollowId];

        #database query to insert the user to be followed 
        $unfollowUser = DB::table('followers')
        				->where($whereArray)
        				->delete();

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
    		return view('follow',['follow' => $follow, 'followersCount'=> $followersCount,'followers' => $followersDetail]);
    	}
    	
    }

}
