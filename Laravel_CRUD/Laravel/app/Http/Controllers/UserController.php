<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function profile()
    {
        $user_id = Auth::user()->id;
 $profile= \DB::table('users')
        ->where('id',$user_id)
        ->first();
        return view('user.profile',['profile'=>$profile]);
    }

    public function userprofile($id)
    {
        $userprofile = DB::table('users')->find($id);


        return view('user.userprofile',['userprofile'=>$userprofile]);
    }

    public function update_profile(Request $request){
      $id = \Auth::user()->id;
      $name = $request->input('username');
      $bio=$request->input('bios');
      $post_email=$request->input('email');
      $newImage = $request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs('images',  $newImage,'public_custom');
      \DB::table('users')
            ->where('id', $id)
            ->update(
                ['name' => $name,
                 'email' => $post_email,
                'bios' => $bio,
                'image' => $newImage]
              );
            return redirect('/profile');

}

    public function userlist()
    {
        $user_id=Auth::user()->id;
        $userslist = \DB::table('users')
        ->where('id','<>',$user_id)
        ->get();
        return view('user.userlist',['userslist'=>$userslist]);
    }

    public function usersresult(Request $request)
    {
        $user_id=Auth::user()->id;
        $search_username=$request->input('userssearch');
        $result_user= \DB::table('users')
        ->where('id','<>',$user_id)
        ->where('name', 'LIKE', "%{$search_username}%")
        ->get();
        return view('user.userresult',['result_user'=>$result_user,'search_username'=>$search_username]);

    }

}
