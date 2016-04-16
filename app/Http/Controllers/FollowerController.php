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

        $followers = DB::table('followers')
    					->where('user_id','==',$userId)	
    					->get();

    	$followersId = array();

    	foreach($followers as $follower){
    		$followersId[] = $follower->follow_id;
    	}

    	#recommendation to follow these users
        $follow = DB::table('users')
    					->whereNotIn('id',$followersId)
    					->where('id','!=',$userId)
    					->get();

    	
 			$followersCount = count($followersId);
    	

       /* $followersId = DB::table('followers')
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
*/
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
    	$followersId[] = $userId;

    	#recommendation to follow these users
        $follow = DB::table('users')
    					->whereNotIn('id',$followersId)
    					->get();
    
 			$followersCount = count($followersId);
    	

    	if($follow){
    		return view('follow',['follow' => $follow, 'followersCount'=> $followersCount,'followers' => $followers]);
    	}
    	
    }

}
