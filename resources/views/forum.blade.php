@extends('layouts.app')

@section('content')

    @foreach($discussions as $disc)
        <br>
        <div class="card">
            <div class="card-header">
                <img src="{{$disc->user->avatar}}" alt="avatar" width="45px" height="45px">&nbsp;
                <span>{{$disc->user->name}} , <b>{{$disc->created_at->diffForHumans()}}</b>  </span>
                @if($disc->has_best_answer($disc->id))
                    <span class="btn btn-success btn-sm float-right">closed</span>
                @else
                    <span class="btn btn-info btn-sm float-right">open</span>
                @endif
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

                <a href="{{route('channel',['slug'=>$disc->channel->slug])}}"
                   class="float-right btn btn-sm ">{{$disc->channel->title}}</a>

            </div>
        </div>
        <br>
    @endforeach
    <div class="text-center">
        {{$discussions->links()}}
    </div>
@endsection
