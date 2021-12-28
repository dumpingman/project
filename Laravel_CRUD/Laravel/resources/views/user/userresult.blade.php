@extends('layouts.app')
 @section('content')
    <div class='container'>
        <h2 class='page-header'></h2>
        検索ワード"{{$search_username}}"
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th>ユーザー名</th>
                <th>プロフィール</th
            </tr>
             @foreach ($result_user as $list)
            <tr>
                 <td class="image"><img class="usericon" src="images/{{ $list->image }}"></td>
                <td>{{ $list->name }}</td>
                <td><a class="button" href="/userprofile/{{$list->id}}">プロフィールへ移動する</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @endsection