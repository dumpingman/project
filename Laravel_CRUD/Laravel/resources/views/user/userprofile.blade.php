@extends('layouts.app')
 @section('content')
    <h2>PROFILE</h2>
<div class="profile-header">
<td class="labelname">NAME : </td>
<td class="profilename"> {{ $userprofile->name}}</td><br>
<td class="labelbio">BIO : </td>
<td>{{ $userprofile->bios}}</td><br>
<td class="labelmail">MAIL ADRESS : </td>
<td>{{ $userprofile->email}}</td>
</div>
 <a href='/index'>トップページへ</a>
    </div>

   @endsection