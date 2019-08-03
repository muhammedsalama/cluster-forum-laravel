@extends('layouts.app')

@section('content')

    @foreach($discussions as $disc)
        <br>
        <div class="card">
            <div class="card-header">
                <img src="{{$disc->user->avatar}}" alt="avatar" width="45px" height="45px">&nbsp;
                <span>{{$disc->user->name}} , <b>{{$disc->created_at->diffForHumans()}}</b>  </span>
                <a href="{{route('discussion',['slug'=>$disc->slug])}}" class="btn float-sm-right">view</a>
            </div>
            <div class="card-body">
                <h3 class="text-center">
                    {{$disc->title}}
                </h3>
                <p class="card-text text-center">
                    {{str_limit($disc->content,40)}}
                </p>
            </div>
            <div class="card-footer">
                @if($disc->replies->count() == 1)
                    {{$disc->replies->count()}} <b>Reply</b>
                @endif

                @if($disc->replies->count() > 1)
                    {{$disc->replies->count()}} <b>Replies</b>
                @endif
            </div>
        </div>
        <br>
    @endforeach
    <div class="text-center">
        {{$discussions->links()}}
    </div>
@endsection
