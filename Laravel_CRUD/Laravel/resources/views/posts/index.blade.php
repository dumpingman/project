 @extends('layouts.app')
 @section('content')

                <div class='container'>
                    <h2>YOUR PROJECTS</h2>
                    <div class='js-modal-open'>
<a class="modalopen"  data-target="modal01" href="" >募集</a>
</div>
<div class="modal js-modal"id="modal01">
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

        <table class='table table-hover'>
            <tr>
                <th>ProjectName</th>
                <th>DETAIL</th>
                <th></th>
            </tr>

            @foreach ($statuslist as $list)
            <tr>
            <td>{{ $list->post_names }}</td>
            <td>{{ $list->post }}</td>
            <td class='js-modal-open'><a class="modalopen"  data-target="{{$list->id}}" href="">詳細</a></td>
            <div class="modal js-modal"id="{{$list->id}}">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__contentss">
            {{ Form::open() }}
        <div class="form-group" >
            {{Form::hidden('id',$list->id,['class'=>'edit-post-no']) }}
            {{Form::label('name','Project Name')}}
            {{ Form::input('text', 'upPost',$list->post_names, ['required', 'class' => 'project_nameform-control']) }}<br>
            {{Form::label('name','DETAIL')}}
            {{ Form::input('text', 'upPost',$list->post, ['required', 'class' => 'project_detailform-control']) }}<br>
        </div>
        <!-- <button type="submit" class="btn btn-primary pull-right">更新</button> -->
        {{ Form::close() }}
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
            </tr>
            @endforeach

        </table>
    </div>
    @endsection