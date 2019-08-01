<?php

namespace App\Http\Controllers;
use Auth;
use App\Discussion;
use Session;

class DiscussionController extends Controller
{
    public function create(){
        return view('discussions.create');
    }

    public function store(){

        $r = request();

        $this->validate($r,[
            'title'=>'required',
            'content'=>'required',
            'channel_id'=>'required'
        ]);

        $discussion = Discussion::create([
            'title'=>$r->title,
            'content'=>$r->content,
            'channel_id'=>$r->channel_id,
            'user_id'=>Auth::id(),
            'slug'=>str_slug($r->title)
        ]);

       Session::flash('success','Discussion Created');

       return redirect()->route('discussion',['slug'=>$discussion->slug]);

    }

    public function show($slug){
        $disussion = Discussion::where('slug',$slug)->first();
        return view('discussions.show')->with('discussion',$disussion);

    }

}
