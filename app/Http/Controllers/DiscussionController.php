<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function create(){
        return view('discussions.create');
    }

    public function store(Request $request){
        dd(request());
    }
}
