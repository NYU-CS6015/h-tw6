<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Status;
class StatusController extends Controller
{
    public function create()
    {
      return view('status.create');
    }
    public function store(Request $request)
    {
      $new_status = new Status;
      $new_status->status = $request->input('status');
      $new_status->save();
    }

    public function view()
    {
      $tweets = Status::all();
      return view('status.display', ['tweets' => $tweets])
    }
}
