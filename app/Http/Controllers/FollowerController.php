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
        	$user = Auth::user();
        }

        $followersId = DB::table('followers')
    					->where('user_id','=',$user->id)	
    					->get();

        $follow = DB::table('users')
//    					->where('id','!=' ,$followersId)
    					->where('id','!=',$user->id)	
    					->get();

    	//$follow = $tempFollow ->except($user->id);

    	//if($followersId){
 			$followers = count($followersId);
    	//}
    	// $followers = DB::table('followers')
    	// 				->where('user_id','=',$user->id)	
    	// 				->count();

    	if($follow){
    		return view('follow',['follow' => $follow, 'followers' => $followers]);
    	}
    }

     public function followUser(Request $request)
    {
    	if (Auth::check())
    	{
        	$userId = Auth::user()->id;
        }
        $followId = $request->input('userId');

        $followUser = DB::table('followers')->insert(
    					array('user_id' => $userId,
          				'follow_id' => $followId)
    					);

       $followers = DB::table('followers')
    					->where('user_id','!=',$userId)	
    					->get();

    	$followersId = array();
    	
    	foreach($followers as $follower){
    		$followersId[] = $follower->follow_id;
    	}

        $follow = DB::table('users')
    					->whereNotIn('id',$followersId)	
    					->get();

    	//if($followersId){
 			$followersCount = count($followers);
    	//}

    	if($follow){
    		return view('follow',['follow' => $follow, 'followers' => $followers,'followersCount'=> $followersCount]);
    	}
    	
    }

}
