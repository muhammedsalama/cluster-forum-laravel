@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="h3">
                        Edit Channel <b><i>{{$channel->title}}</i></b>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('channels.update',['channel'=>$channel->id])}}" method="post">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="form-group">
                                <input type="text" value="{{$channel->title}}" name="channel" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Update Channel</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection