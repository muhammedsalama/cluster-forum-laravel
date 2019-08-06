<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Reply;
use App\Like;
use Auth;

class RepliesController extends Controller
{
    public function like($id){

        Like::create([
            'reply_id'=>$id,
            'user_id'=>Auth::id()

        ]);
        Session::flash('success,Reply liked');
        return redirect()->back();
    }

    public function dislike($id){
        $like = Like::where('reply_id',$id)->where('user_id',Auth::id())->first();

        $like->delete();
        Session::flash('success,Reply Disliked');
        return redirect()->back();

    }

}
