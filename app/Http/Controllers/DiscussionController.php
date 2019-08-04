<?php

namespace App\Http\Controllers;
use App\Reply;
use Auth;
use Illuminate\Http\Request;
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
        $disc = Discussion::where('slug',$slug)->first();
        return view('discussions.show')->with('disc',$disc);

    }

    public function reply($id , Request $request){

        $d = Discussion::find($id);

        Reply::create([
            'user_id'=> Auth::id(),
            'discussion_id'=>$id,
            'content'=>$request->reply
        ]);

        Session::flash('success','Reply Added');

        return redirect()->back();
    }

}
