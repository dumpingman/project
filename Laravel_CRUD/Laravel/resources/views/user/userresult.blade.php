@extends('layouts.app')
 @section('content')
    <div class='container'>
        <h2 class='page-header'>稿</h2>
        検索ワード"{{$search_username}}"
        <table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿名</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
             @foreach ($result_user as $list)
            <tr>
                <<td>{{ $list->id }}</td>
                <td>{{ $list->name }}</td>
                <td><a class="button" href="/userprofile/{{$list->id}}">プロフィールへ移動する</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @endsection