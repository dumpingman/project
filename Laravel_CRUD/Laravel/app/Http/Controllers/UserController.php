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
      $bio=$request->input('bio');
      $post_email=$request->input('email');
      $newImage = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images/', $newImage);
      // if(isset($image)&& isset($name)){
      //   $newImage = $request->file('image')->getClientOriginalName();
      //   $request->file('image')->storeAs('public/images/', $newImage);
        \DB::table('users')
            ->where('id', $id)
            ->update(
                ['name' => $name,
                 'email' => $post_email,
                'bio' => $bio,
                'images' => $newImage]
              );
            return redirect('/profile');
      // }elseif (isset($image) && !isset($name)){
      //   $newImage = $request->file('image')->getClientOriginalName();
      //   $request->file('image')->storeAs('public/images/', $newImage);
      //   \DB::table('users')
      //       ->where('id', $id)
      //       ->update(
      //           [
      //             'email' => $post_email,
      //           'bio' => $bio,
      //           'images' => $newImage]
      //         );
      //       return redirect('/profile');
      // }elseif (!isset($image) && isset($name)){
      //   \DB::table('users')
      //       ->where('id', $id)
      //       ->update(
      //           ['name' => $name,
      //             'email' => $post_email,
      //           'bio' => $bio]
      //         );
      //       return redirect('/profile');
      // }elseif (!isset($image) && !isset($name)){
      //   \DB::table('users')
      //       ->where('id', $id)
      //       ->update(
      //           [
      //            'email' => $post_email,
      //           'bio' => $bio]
      //         );
      //       return redirect('/profile');
      //     }
}

    public function userlist()
    {
        $userslist = \DB::table('users')->get();
        return view('user.userlist',['userslist'=>$userslist]);
    }

     public function usersresult(Request $request)
    {
        $search_username=$request->input('userssearch');
        $result_user= \DB::table('users')
        ->where('name', 'LIKE', "%{$search_username}%")
        ->get();
        return view('user.userresult',['result_user'=>$result_user,'search_username'=>$search_username]);

    }

    // public function logout()
    // {   session()->flush();
    //     Auth::logout();
    //     return redirect('/login');
    // }
}
