<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $discussions = Discussion::orderBy('created_at','desc')->paginate(3);
        return view('forum')->with('discussions',$discussions);
    }
}
