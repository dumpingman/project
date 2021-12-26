@extends('layouts.app')
 @section('content')
    <div class='container'>
        {{ Form::open(['url' => '/userresult']) }}
 {{ Form::text('userssearch',null, ['class' => 'search-form-control', 'placeholder' => 'ユーザー名'])}}
 {{ Form::image('images/post.png'), ['class' => 'search-form-control', 'placeholder' => 'ユーザー名']}}
 {{ Form::close()}}
        <h2 class='page-header'></h2>
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th>ユーザー名</th>
                <th>プロフィール</th>
            </tr>
 @foreach ($userslist as $list)
            <tr>
                <td class="image"><img class="usericon" src="images/{{ $list->images }}"></td>
                <td>{{ $list->name }}</td>
                <td><a class="button" href="/userprofile/{{$list->id}}">プロフィールへ移動する</a></td>
                </tr>
            @endforeach
        </table>
        <a href='/index'>トップページへ</a>
    </div>
   @endsection