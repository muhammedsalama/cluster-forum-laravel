<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

;

use App\Channel;
use App\Discussion;
use Illuminate\Pagination\Paginator;


class ForumController extends Controller
{
    public function index()
    {

        switch (request('filter')) {
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(3);
                break;

            case 'solved':
                $answered = array();
                foreach (Discussion::all() as $d) {
                    if ($d->has_best_answer()) {
                        array_push($answered, $d);
                    }
                }
                $results = new Paginator($answered, 3);
                break;

            case 'unsolved':
                $unanswered = array();
                foreach (Discussion::all() as $d) {
                    if (!$d->has_best_answer()) {
                        array_push($unanswered, $d);
                    }
                }
                $results = new Paginator($unanswered, 3);
                break;

            default:
                $results = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }

        return view('forum')->with('discussions', $results);
    }

    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();

        $discussions = $channel->discussions()->paginate(3);

        return view('channel')->with('discussions', $discussions);

    }
}
