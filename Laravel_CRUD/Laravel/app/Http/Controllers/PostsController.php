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
            'post_name' => $post_name,
            'user_id' => $user_id,
            'post_email'=>$post_email,
            'finish_at'=>$finish_at
        ]);

        return redirect('/projectlist');
    }

    //応募状況ページ（案件一覧）表示
    public function projectlist()
    {
        $user_id=Auth::user()->id;
        // $count_joins = \DB::table('join')
        // ->where('join', $user_id)
        // ->count();
        $list = \DB::table('users')
        ->join('posts','posts.user_id','=','users.id')
        // ->join('users','posts.user_id','=','users.id')
        ->get();
        return view('posts.projectlist',['list'=>$list]);
    }

    // 応募状況ページ(案件検索機能)
    public function result(Request $request)
    {
        $search_name=$request->input('search');
        $result_projectlist= \DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('post_name', 'LIKE', "%{$search_name}%")
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
