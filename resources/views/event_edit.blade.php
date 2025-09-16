@extends('app')

@section('title')
    イベント情報編集画面
@endsection

@section('content')
<a href="{{route("event_index")}}" class="btn btn-danger" >戻る</a>
<h1>イベント情報編集画面</h1>
<form action="{{route("event_update",$event->id)}}" method="post">
    @csrf
    <div>
    <label for="">イベント名</label>
    <input type="text" name="name" id="" value="{{$event->name}}">
    </div>
     <div>
    <label for="">開催場所</label>
    <input type="text" name="place" id="" value="{{$event->place}}">
    </div>
         <div>
    <label for="">開催日</label>
    <input type="date" name="date" id="" value="{{$event->date}}">
    </div>
         <div>
    <label for="">イベントマップURL</label>
    <input type="text" name="map_image" id="" value="{{$event->map_image}}">
    </div>
    <input type="submit" class="btn btn-outline-success" value="編集">
    @if($errors->first())
        <div class="alert alert-danger">{{$errors->first()}}</div>
    @endif
     @if(session("message"))
        <div class="alert alert-success">{{session("message")}}</div>
    @endif
</form>

@endsection