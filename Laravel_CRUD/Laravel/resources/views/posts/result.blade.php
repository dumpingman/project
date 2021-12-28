@extends('layouts.app')
 @section('content')
    <div class='container'>

        <table class='table table-hover'>
            検索ワード"{{$search_name}}"
            <tr>
                <th>案件名</th>
                <th>クライアント名</th>
                <th>掲載日</th>
                <th>締め切り日</th>
                <th>応募</th>
            </tr>
             @foreach ($result_projectlist as $list)
            <tr>
                <td>{{ $list->post_names }}</td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->created_at }}</td>
                <td>{{ $list->finished_at }}</td>
                <td><a class="button" href="/projectstatus/{{$list->id}}">応募する</a></td>

            </tr>
            @endforeach
        </table>
    </div>
    @endsection