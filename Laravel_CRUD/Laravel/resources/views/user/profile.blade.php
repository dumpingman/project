@extends('layouts.app')
 @section('content')
    <div class='container'>
        <div class='js-modal-open'>
<a class="modalopen"  data-target="modal01" href="" >プロフィール編集</a>
</div>
<div class="modal js-modal"id="modal01">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <h2>USER INFO</h2>
            {{ Form::open(['url' => '/update/profile','files' => true ,'enctype' => 'multipart/form-data']) }}
  <div class="form-group" >
   <!--  {{ Form::file('image') }} -->
    <label>NAME</label><br>
 {{ Form::text('username',$profile->name,null, ['class' => 'form-control'])}}<br>

<label>MAIL ADRESS</label><br>
 {{ Form::text('email',$profile->email,null, ['class' => 'form-control'])}}<br>

<label>BIO</label><br>
 {{ Form::text('bios',$profile->bios,null, ['class' => 'bio-Postcontrol'])}}<br>
    </div>
    {{Form::file('image', null, 'ファイルを選択', ) }}
   <!--  <button type="submit">更新</button> -->
 {{ Form::image('images/post.png')}}
 {{ Form::close()}}

 </div>
 </div>
        <h2>PROFILE</h2>
<td class="image"><img class="usericon" src="images/{{ $profile->image }}"></td>
<div class="profile-header">
<td class="labelname">NAME : </td>
<td class="profilename"> {{ $profile->name}}</td><br>
<td class="labelbio">BIO : </td>
<td>{{ $profile->bios}}</td><br>
<td class="labelmail">MAIL ADRESS : </td>
<td>{{ $profile->email}}</td>
</div>



        <a href='/index'>トップページへ</a>




    </div>

   @endsection