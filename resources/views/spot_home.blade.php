@extends('app')

@section('title')
    イベント情報ホーム画面
@endsection

@section('content')
<a href="{{route("menu")}}" class="btn btn-danger" >戻る</a>

<h1>スポット情報ホーム画面</h1>
<a href="{{route("spot_create")}}" class="btn btn-primary">スポット情報新規登録</a>

<table class="table table-bordered">
    <tr>
        <th>イベント名</th>
        <th>スポット名</th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($spots as $spot )
        <tr>
            <td>{{ $spot->event->name }}</td>
            <td>{{ $spot->name }}</td>
            <td><a href="{{route("spot_edit",$spot->id)}}" class="btn btn-success">編集</a></td>
            <td>
                <form action="{{route("spot_destroy",$spot->id)}}" method="post">
                    @csrf
                    <input class="btn btn-danger" type="submit" value="削除" onclick="return window.confirm('削除してもよろしいですか？')">
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection