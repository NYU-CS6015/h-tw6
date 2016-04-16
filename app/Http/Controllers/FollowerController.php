<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class FollowerController extends Controller
{
    //
     public function followers()
    {
        $user = Auth::user()->id;
        $followers = DB::table('followers')
    					->where('user_id','=',$user)	
    					->get();
    	if($followers){
    		return view('follow',['followers' => $followers]);
    	}
    }

	public function follow()
    {
        $user = Auth::user()->id;
        $follow = DB::table('users')
    					->where('user_id','!=',$user)	
    					->get();
    	if($followers){
    		return view('follow',['follow' => $follow]);
    	}
    }    
}
