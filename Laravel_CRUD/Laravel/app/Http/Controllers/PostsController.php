<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    // トップページ（参画案件）表示
    public function index()
    {
        $user = Auth::user();
        $statuslist = \DB::table('posts')
            ->leftjoin('join', 'posts.id', '=', 'join.joiners')
            ->where('join.join',$user->id)
            ->orderBy('posts.id', 'desc')
            ->get();
        return view('posts.index',['statuslist'=>$statuslist]);
    }

    // トップページ（案件募集機能）
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        $post_name = $request->input('postName');
        $post_email=$request->input('postEmail');
        $finish_at=$request->input('finish_at');
        $user_id=Auth::user()->id;

        \DB::table('posts')
        ->insert([
            'post' => $post,
            'post_names' => $post_name,
            'users_id' => $user_id,
            'post_emails'=>$post_email,
            'finished_at'=>$finish_at
        ]);

        return redirect('/projectlist');
    }

    //応募状況ページ（案件一覧）表示
    public function projectlist()
    {
        $user_id=Auth::user()->id;
        $list = \DB::table('users')
        ->join('posts','posts.users_id','=','users.id')
        ->get();
        return view('posts.projectlist',['list'=>$list]);
    }

    // 応募状況ページ(案件検索機能)
    public function result(Request $request)
    {
        $search_name=$request->input('search');
        $result_projectlist= \DB::table('users')
        ->join('posts','posts.users_id','=','users.id')
        ->where('post_names', 'LIKE', "%{$search_name}%")
        ->get();
        return view('posts.result',['result_projectlist'=>$result_projectlist,'search_name'=>$search_name]);

    }

    public function projectstatus($id){
        $user = Auth::user();
        $user_id=Auth::user()->id;
        $count = \DB::table('join')
            ->where('joiners',$id)
            ->count();
        $userprofile = DB::table('posts')->find($id);
        return view('posts.projectstatus',['userprofile'=>$userprofile,'count'=>$count]);
    }
}
