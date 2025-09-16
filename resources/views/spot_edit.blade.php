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
    <select name="select" id="" >
        @foreach ($events as $event)
        <option {{ $spot->event->id==$event->id ? "selected": "" }} value="{{$event->id}}">{{ $event->name }}</option>
        @endforeach
    </select>
    </div>
     <div>
    <label for="">スポット名</label>
    <input type="text" name="name" id="" value="{{$spot->name}}">
    </div>
     <div>
    <label for="">スポット詳細テキスト</label>
    <input type="text" name="description" id="" value="{{$spot->description}}">
    </div>
    <div>
    <label for="">スポット位置情報(x)</label>
    <input type="number" name="location_x" id="" value="{{$spot->location_x}}">
    </div>
    <div>
    <label for="">スポット位置情報(y)</label>
    <input type="number" name="location_y" id="" value="{{$spot->location_y}}">
    </div>
         <div>
    <label for="">スポット画像</label>
    <input type="text" name="images" id="" value="{{$spot->images}}">
    </div>
    <input type="submit" class="btn btn-outline-success" value="保存">
    @if($errors->first())
        <div class="alert alert-danger">{{$errors->first()}}</div>
    @endif
     @if(session("message"))
        <div class="alert alert-primary">{{session("message")}}</div>
    @endif
</form>

@endsection