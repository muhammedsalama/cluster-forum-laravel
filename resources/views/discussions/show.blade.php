@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{$discussion->title}}</div>

        <div class="card-body">

            {{$discussion->content}}
        </div>
    </div>
@endsection
