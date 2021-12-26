@extends('layouts.app')
 @section('content')
    <div class='container'>
    	 <h2>PROJECTS STATUS</h2>
<div class="profile-header">
<td class="labelname">ProjectName : </td>
<td class="profilename"> {{ $userprofile->post_name}}</td><br>
<td class="labelbio"> DETAIL : </td>
<td>{{ $userprofile->post}}</td><br>
<td class="labelmail">参加人数 : </td>
<td>{{ $count}}</td><br>
 <td>
                {{ Form::open(['url' => '/join']) }}
                {{ Form::hidden('id',$userprofile->id)}}
                {{ Form::submit('参画する')}}
                {{ Form::close() }}
                </td>
</div>
 <a href='/index'>トップページへ</a>
    </div>

   @endsection