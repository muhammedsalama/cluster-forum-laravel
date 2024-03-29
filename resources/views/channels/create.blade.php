@extends('layouts/app')

@section('content')
    <div class="panel panel-default">
        <div class="h3">
            Create Channel
        </div>
        <div class="panel-body">
            <form action="{{route('channels.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="channel" class="form-control" placeholder="Channel Name ..">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Create Channel</button>
                    </div>
                </div>


            </form>
        </div>


    </div>



@endsection
