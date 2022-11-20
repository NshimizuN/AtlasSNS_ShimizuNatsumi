<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; ////Auth認証に必要な記述

class FollowsController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    //search.blade フォロー機能
    public function follow($id)
    {
        //dd("123");
        //dd("id");
        $following = Auth::user()->id; //$followingにログインユーザーidを代入
        $request = request('id');
        $followlist = \DB::table('follows')
            ->where('following_id', '=', Auth::user()->id)
            ->get();
        \DB::table('follows')->insert([ //followsテーブルに追加
            'following_id' => $following, //followind_idカラム$followingを持ってくる
            'followed_id' => $id,  //followed_idカラムに$followerを持ってくる
        ]);
        return redirect('search');  //search画面へルーティング
    }

    //search.blade フォロー解除機能
    public function unFollow($id)
    {
        //dd("123");
        \DB::table('follows')
            ->where('followed_id', $id)
            ->delete();
        return redirect('search');
    }

    //follow.balde フォローリスト
    public function followList()
    {
        //dd("123");
        return view('follows.followList');
    }

    //follor.baldeフォロワーリスト
    public function followerList()
    {
        return view('follows.followerList');
    }
}
