@extends('layouts.app')

@section('content')
    <h2>Forum</h2>
    @foreach($discussions as $disc)
        <div class="card">
            <div class="card-header">
                <img src="{{$disc->user->avatar}}" alt="avatar" width="70px" height="70px">
                {{$disc->title}}</div>
            <div class="card-body">
                {{$disc->content}}
            </div>
        </div>
    @endforeach
    <div class="text-center">
        {{$discussions->links()}}
    </div>
@endsection
