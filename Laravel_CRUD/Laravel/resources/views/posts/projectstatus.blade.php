@extends('layouts.app')
 @section('content')
    <div class='container'>
    	 <h2>PROJECTS STATUS</h2>
<div class="profile-header">
<td class="labelname">ProjectName : </td>
<td class="profilename"> {{ $postprofile->post_names}}</td><br>
<td class="labelbio"> DETAIL : </td>
<td>{{ $postprofile->post}}</td><br>
<td class="labelmail">参加人数 : </td>
<td>{{ $count}}</td><br>
 <td>
                {{ Form::open(['url' => '/join']) }}
                {{ Form::hidden('id',$postprofile->id)}}
                {{ Form::submit('参画する')}}
                {{ Form::close() }}
                </td>
</div>
 <a href='/index'>トップページへ</a>
    </div>

   @endsection