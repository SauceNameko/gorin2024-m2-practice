@extends('app')

@section('title')
    メニュー画面
@endsection

@section('content')

<h1>メニュー画面</h1>
<a href="{{route("event_index")}}" class="btn btn-primary">イベント情報</a>
<a href="{{route("spot_index")}}" class="btn btn-success">スポット情報</a>
<a href="{{route("log_index")}}" class="btn btn-danger">ログ情報</a>

@endsection