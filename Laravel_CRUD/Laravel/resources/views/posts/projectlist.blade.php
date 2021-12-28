@extends('layouts.app')
 @section('content')
        <div class='container'>
            <h2>PROJECTS LIST</h2>
                    <!-- <div class='js-modal-open'>
<a class="modalopen"  data-target="modal01" href="" >募集</a>
</div> -->

        {{ Form::open(['url' => '/result']) }}
 {{ Form::text('search',null, ['class' => 'search-form-control','placeholder' => '案件名を入力してください',])}}
 {{ Form::image('images/post.png')}}
 {{ Form::close()}}
        <h2 class='page-header'></h2>
        <table class='table table-hover'>
            <tr>
                <th>案件名</th>
                <th>クライアント名</th>
                <th>掲載日</th>
                <th>締め切り日</th>
                <th>応募</th>
            </tr>
             @foreach ($list as $list)
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