@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">Create a new discussion</div>

        <div class="card-body">
            <form action="{{route('discussion.store')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="channel_id">Pick a channel</label>
                    <select name="channel_id" id="channel_id" class="form-control">
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">{{$channel->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Ask a Question!</label>
                    <textarea type="text" name="content" id="content" class="form-control" placeholder="Discussion body.."></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success pull-right" type="submit">Create Discussion</button>
                </div>

            </form>
        </div>
    </div>

@endsection
