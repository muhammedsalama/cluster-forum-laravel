@extends('layouts.app')

@section('content')


    <br>
    <div class="card">
        <div class="card-header">
            <img src="{{$disc->user->avatar}}" alt="avatar" width="45px" height="45px">&nbsp;
            <span>{{$disc->user->name}} , <b>{{$disc->created_at->diffForHumans()}}</b> <b>({{$disc->user->points}} pts)</b>  </span>

            @if($disc->is_being_watched_by_auth_user())
                <a href="{{route('discussion.unwatch',['disc_id'=>$disc->id])}}"
                   class="btn btn-sm float-right">unwatch</a>
            @else
                <a href="{{route('discussion.watch',['disc_id'=>$disc->id])}}" class="btn btn-sm float-right">watch</a>
            @endif

        </div>
        <div class="card-body">
            <h3 class="text-center">
                {{$disc->title}}
            </h3>
            <p class="card-text text-center">
                {{$disc->content}}
            </p>

            <hr>

            @if($best_answer)
                <div class="text-center" style="padding: 30px;">
                    <div class="card card-header alert-success">
                        <div class="h3">BEST ANSWER</div>
                        <div><img src="{{$best_answer->user->avatar}}" alt="avatar" width="45px" height="45px">&nbsp
                        </div>
                        <b>({{$best_answer->user->points}} pts)</b>
                        <span>{{$best_answer->user->name}}  </span>
                    </div>
                    <div class="card card-body">
                        {{$best_answer->content}}
                    </div>
                </div>
            @endif

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
                <span>{{$reply->user->name}} , <b>{{$reply->created_at->diffForHumans()}}</b><b> ({{$reply->user->points}} pts)</b> </span>

                @if(!$best_answer)
                    @if(Auth::id() == $disc->user->id)
                        <a href="{{route('best_answer',['reply_id'=>$reply->id])}}"
                           class="btn btn-sm btn-info float-right">Mark as best answer</a>
                    @endif
                @endif

            </div>
            <div class="card-body">
                <p class="card-text text-center">
                    {{$reply->content}}
                </p>
            </div>
            <div class="card-footer">
                @if($reply->is_liked_by_auth_user())
                    <a href="{{route('reply.dislike',['id'=>$reply->id])}}" class="btn btn-danger btn-sm">Dislike <span
                                class="badge">{{$reply->likes->count()}}</span> </a>
                @else
                    <a href="{{route('reply.like',['id'=>$reply->id])}}" class="btn btn-success btn-sm">Like <span
                                class="badge">{{$reply->likes->count()}}</span></a>
                @endif
            </div>
        </div>
    @endforeach

    <div class="card">
        <div class="card card-body">
            @if(Auth::check())
                <form action="{{route('discussion.reply',['id'=>$disc->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea type="text" class="form-control" placeholder="Add a reply" name="reply"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn float-right" type="submit">Leave a reply</button>
                    </div>
                </form>
            @else

                <div class="text-center alert alert-warning">
                    <h2>Sign in to Leave a reply</h2>
                </div>

            @endif
        </div>
    </div>

@endsection
