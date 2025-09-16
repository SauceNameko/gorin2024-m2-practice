@extends('app')

@section('title')
    イベント情報新規登録画面
@endsection

@section('content')
<a href="{{route("event_index")}}" class="btn btn-danger" >戻る</a>
<h1>イベント情報新規登録画面</h1>
<form action="{{route("event_store")}}" method="post">
    @csrf
    <div>
    <label for="">イベント名</label>
    <input type="text" name="name" id="">
    </div>
     <div>
    <label for="">開催場所</label>
    <input type="text" name="place" id="">
    </div>
         <div>
    <label for="">開催日</label>
    <input type="date" name="date" id="">
    </div>
         <div>
    <label for="">イベントマップURL</label>
    <input type="text" name="map_image" id="">
    </div>
    <input type="submit" class="btn btn-outline-primary" value="登録">
    @if($errors->first())
        <div class="alert alert-danger">{{$errors->first()}}</div>
    @endif
     @if(session("message"))
        <div class="alert alert-primary">{{session("message")}}</div>
    @endif
</form>

@endsection