@extends('layouts.app')
 @section('content')
    <div class='container'>
<!-- <div class='js-modal-open'>
<a class="modalopen"  data-target="modal01" href="" >募集</a>
</div> -->

 <!-- <a class="js-modal-close" href="">閉じる</a> -->

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
                <td>{{ $list->post_name }}</td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->created_at }}</td>
                <td>{{ $list->finish_at }}</td>
                <td> <div class='js-modal-open'>
<a class="modalopen"  data-target="{{$list->id}}" href="" >応募する</a>
</div></td>
<div class="modal js-modal"id="{{$list->id}}">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
<h2>PROJECT INFO</h2>
{{ Form::open(['url' => '/post/create']) }}
  <div class="form-group" >
<label>PROJECT NAME</label><br>
{{ Form::text('postName',null, ['class' => 'form-Namecontrol'])}}<br>
 <label>MAIL ADRESS</label><br>
 {{ Form::text('postEmail',null, ['class' => 'form-Emailcontrol'])}}<br>
 <label>DEAD TIME</label><br>
  {{ Form::text('finish_at',null, ['class' => 'form-Timecontrol'])}}<br>
 <label>DETAIL</label><br>
 {{ Form::text('newPost',null, ['class' => 'form-Postcontrol'])}}
</div>
 {{ Form::image('images/post.png')}}
 {{ Form::close()}}

 <!-- <a class="js-modal-close" href="">閉じる</a> -->
 </div>
 </div>
                <!-- <td>
                {{ Form::open(['url' => '/join']) }}
                {{ Form::hidden('id',$list->id)}}
                {{ Form::submit('参画する')}}
                {{ Form::close() }}

                {{ Form::open(['url' => '/unjoin']) }}
                {{ Form::hidden('id',$list->id)}}
                {{ Form::submit('キャンセル')}}
                {{ Form::close() }}
                </td> -->
            </tr>
            @endforeach
        </table>
    </div>
    @endsection