<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class FollowerController extends Controller
{
    //
     public function followers()
    {
    	if (Auth::check())
    	{
        	$userId = Auth::user()->id;
        }
        $followers = DB::table('followers')
    					->where('user_id','=',$userId)	
    					->get();
    	
    	if($followers){
    		return view('follow',['followers' => $followers]);
    	}
    }

	public function follow()
    {
    	if (Auth::check())
		{
        	$user = Auth::user();
        }
        $follow = DB::table('users')
    					->where('id','!=',$user->id)	
    					->get();
    	if($follow){
    		return view('follow',['follow' => $follow]);
    	}
    }    
}
