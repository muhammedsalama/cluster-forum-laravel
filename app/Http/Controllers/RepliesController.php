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
        session()->flash('success,Reply liked');
        return redirect()->back();
    }

    public function dislike($id){
        $like = Like::where('reply_id',$id)->where('user_id',Auth::id())->first();

        $like->delete();
        session()->flash('success,Reply Disliked');
        return redirect()->back();

    }

    public function mark_as_best_answer($id){
        $reply = Reply::find($id);

        $reply->best_answer = 1;
        $reply->save();

        $reply->user->points += 50;
        $reply->user->save();

        session()->flash('success','Marked as best answer');

        return redirect()->back();
    }

}
