@extends('app')

@section('title')
    スポット情報新規登録画面
@endsection

@section('content')
<a href="{{route("spot_index")}}" class="btn btn-danger" >戻る</a>
<h1>スポット情報新規登録画面</h1>
<form action="{{route("spot_store")}}" method="post">
    @csrf
    <div>
    <label for="">イベント名</label>
    <select name="select" id="">
        @foreach ($events as $event)
        <option value="{{$event->id}}">{{ $event->name }}</option>
        @endforeach
    </select>
    </div>
     <div>
    <label for="">スポット名</label>
    <input type="text" name="name" id="">
    </div>
     <div>
    <label for="">スポット詳細テキスト</label>
    <input type="text" name="description" id="">
    </div>
    <div>
    <label for="">スポット位置情報(x)</label>
    <input type="number" name="location_x" id="">
    </div>
    <div>
    <label for="">スポット位置情報(y)</label>
    <input type="number" name="location_y" id="">
    </div>
         <div>
    <label for="">スポット画像</label>
    <input type="text" name="images" id="">
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