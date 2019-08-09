<?php

namespace App\Http\Controllers;

use App\Watcher;
use Illuminate\Http\Request;
use Auth;
use Session;

class WatcherController extends Controller
{
    public function watch($disc_id){
        Watcher::create([
            'discussion_id'=>$disc_id,
            'user_id'=>Auth::id()
        ]);

        Session::flash('success','You are watching this discussion');
        return redirect()->back();
    }

    public function unwatch($disc_id){
        $watcher =  Watcher::where('discussion_id',$disc_id)->where('user_id',Auth::id());

        $watcher->delete();

        Session::flash('success','You are done watching this discussion');
        return redirect()->back();
    }

}
