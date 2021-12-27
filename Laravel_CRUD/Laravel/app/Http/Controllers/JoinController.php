<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class JoinController extends Controller
{
    //応募状況ページ（参画機能）
    public function join(Request $request){
    	$join=Auth::user()->id;
    	$joiner=$request->input('id');
		\DB::table('join')->insert([
		'join'=>$join,
      	'joiners'=>$joiner
		]);
		return redirect('/index');
    }

    // public function count(Request $request){
    //     $user = Auth::user();
    //     $count = \DB::table('posts')
    //         ->leftjoin('join', 'posts.id', '=', 'join.joiner')
    //         ->where('join.join',$user->id)
    //         ->count();
    //     // $user_id=Auth::user()->id;
    //     // $joiner=$request->input('id');
    //     // $count=\DB::table('join')
    //     // ->where('join',$user_id)
    //     // ->count();
    //     return view('posts.projectstatus',['count'=>$count]);
    // }

}
