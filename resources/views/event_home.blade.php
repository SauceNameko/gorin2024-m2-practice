@extends('app')

@section('title')
    イベント情報ホーム画面
@endsection

@section('content')
<a href="{{route("menu")}}" class="btn btn-danger" >戻る</a>

<h1>イベント情報ホーム画面</h1>
<a href="{{route("event_create")}}" class="btn btn-primary">イベント情報新規登録</a>

<table class="table table-bordered">
    <tr>
        <th>イベント名</th>
        <th>開催場所</th>
        <th>開催日</th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($events as $event )
        <tr>
            <td>{{ $event->name }}</td>
            <td>{{ $event->place }}</td>
            <td>{{ $event->date }}</td>
            <td><a href="{{route("event_edit",$event->id)}}" class="btn btn-success">編集</a></td>
            <td>
                <form action="{{route("event_destroy",$event->id)}}" method="post">
                    @csrf
                    <input class="btn btn-danger" type="submit" value="削除" onclick="return window.confirm('削除してもよろしいですか？')">
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection