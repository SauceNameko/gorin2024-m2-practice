@extends('app')

@section('title')
    ログ情報ホーム画面
@endsection

@section('content')
<a href="{{route("menu")}}" class="btn btn-danger" >戻る</a>

<h1>ログ情報ホーム画面</h1>

<table class="table table-bordered">
    <tr>
        <th>ログID</th>
        <th>イベント名</th>
        <th>スポット名</th>
        <th>操作種別</th>
        <th>操作日時</th>
        <th></th>
    </tr>
    @foreach ($logs as $log )
        <tr>
            <td>{{ $log->id }}</td>
            <td>{{ $log->event->name }}</td>
            <td>{{ empty($log->spot->name) ? "":""  }}</td>
            <td>{{ $log->operation_type }}</td>
            <td>{{ $log->created_at }}</td>
            <td>
                <form action="{{route("log_destroy",$log->id)}}" method="post">
                    @csrf
                    <input class="btn btn-danger" type="submit" value="削除" onclick="return window.confirm('削除してもよろしいですか？')">
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection