@extends('layouts.app')

@section('content')


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
                {{$disc->content}}
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

    @foreach($disc->replies as $reply)
        <div class="card">
            <div class="card-header">
                <img src="{{$reply->user->avatar}}" alt="avatar" width="45px" height="45px">&nbsp;
                <span>{{$reply->user->name}} , <b>{{$reply->created_at->diffForHumans()}}</b> </span>
            </div>
            <div class="card-body">
                <p class="card-text text-center">
                    {{$reply->content}}
                </p>
            </div>
            <div class="card-footer">
                @if($reply->is_liked_by_auth_user())
                    <a href="{{route('reply.dislike',['id'=>$reply->id])}}" class="btn btn-danger btn-sm">Dislike <span class="badge">{{$reply->likes->count()}}</span> </a>
                @else
                    <a href="{{route('reply.like',['id'=>$reply->id])}}" class="btn btn-success btn-sm">Like <span class="badge">{{$reply->likes->count()}}</span></a>
                @endif
            </div>
        </div>
    @endforeach

    <div class="card">
        <div class="card card-body">
            <form action="{{route('discussion.reply',['id'=>$disc->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea type="text" class="form-control" placeholder="Add a reply" name="reply"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn float-right" type="submit">Leave a reply</button>
                </div>
            </form>
        </div>
    </div>

@endsection
