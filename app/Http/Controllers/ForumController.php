<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;


class ForumController extends Controller
{
    public function index(){

        $discussions = Discussion::orderBy('created_at','desc')->paginate(3);

        return view('forum')->with('discussions',$discussions);
    }

    public function channel($slug){
        $channel = Channel::where('slug',$slug)->first();

        $discussions = $channel->discussions()->paginate(3);

        return view('channel')->with('discussions',$discussions);

    }
}
