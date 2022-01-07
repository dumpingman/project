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

//     public function update_profile(Request $request){
//       $id = \Auth::user()->id;
//       $name = $request->input('username');
//       $bio=$request->input('bios');
//       $post_email=$request->input('email');
//       $newImage = $request->file('image')->getClientOriginalName();
//         $request->file('image')->storeAs('public/images/', $newImage);
//       // if(isset($image)&& isset($name)){
//       //   $newImage = $request->file('image')->getClientOriginalName();
//       //   $request->file('image')->storeAs('public/images/', $newImage);
//         \DB::table('users')
//             ->where('id', $id)
//             ->update(
//                 ['name' => $name,
//                  'email' => $post_email,
//                 'bios' => $bio,
//                 'image' => $newImage]
//               );
//             return redirect('/profile');

// }

public function update_profile(Request $request){
$profileData=$request->input();
$update_id=$request->input('id');
$hostId=Auth::user()->id;
$file=$request->file('image');
if(!is_null($file)){
$originalName=$file->getClientOriginalName();
$dir='image';
$file->storeAs($dir,$originalName,['disk'=>'public_uploads']);
}
if(isset($file)){
DB::table('users')
->where('id',$hostId)
->update(
['name'=>$profileData['username'],
'email'=>$profileData['email'],
'bios'=>$profileData['bios'],
'image'=>$originalName
]
);
}
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


    // public function logout()
    // {   session()->flush();
    //     Auth::logout();
    //     return redirect('/login');
    // }
}
