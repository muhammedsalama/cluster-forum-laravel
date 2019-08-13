<?php

namespace App\Http\Controllers;


use App\Reply;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Discussion;
use Illuminate\Support\Facades\Notification;
use Session;

class DiscussionController extends Controller
{
    public function create()
    {
        return view('discussions.create');
    }

    public function store()
    {

        $r = request();

        $this->validate($r, [
            'title' => 'required',
            'content' => 'required',
            'channel_id' => 'required'
        ]);

        $discussion = Discussion::create([
            'title' => $r->title,
            'content' => $r->content,
            'channel_id' => $r->channel_id,
            'user_id' => Auth::id(),
            'slug' => str_slug($r->title)
        ]);

        Session::flash('success', 'Discussion Created');

        return redirect()->route('discussion', ['slug' => $discussion->slug]);

    }

    public function show($slug)
    {
        $disc = Discussion::where('slug', $slug)->first();

        $best_answer = $disc->replies()->where('best_answer',1)->first();

        return view('discussions.show')
            ->with('disc', $disc)
            ->with('best_answer',$best_answer);
    }

    public function reply($id, Request $request)
    {

        $d = Discussion::find($id);


        $reply =  Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => $request->reply
        ]);

        $reply->user->points += 25;
        $reply->user->save();


        $watchers = array();

        foreach ($d->watchers as $watcher):
            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        //send notifications to watchers' mails
        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));

        Session::flash('success', 'Reply Added');

        return redirect()->back();
    }

}
