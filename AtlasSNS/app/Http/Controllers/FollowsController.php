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
        $following = Auth::user()->id; //$followingにログインユーザーidを代入
        $request = request('id');
        \DB::table('follows')->insert([ //followsテーブルに追加
            'following_id' => $following, //followind_idカラム$followingを持ってくる
            'followed_id' => $id,  //followed_idカラムに$followerを持ってくる
        ]);
        return redirect('search');  //search画面へルーティング
    }

    //search.blade フォロー解除機能
    public function unfollow($id)
    {
        \DB::table('follows')->where([ //followsテーブルを指定
            'followed_id' => $id, //followed_idカラムのフォローされてるID
            'following_id' => Auth::user()->id //following_idのログインユーザーのIDを
        ])
            ->delete(); //消す
        return redirect('search'); //search画面へルーティング
    }

    //follow.balde フォローリスト
    public function followlist()
    {
        //dd("123");
        return view('follows.followlist');
    }

    //follor.baldeフォロワーリスト
    public function followerList()
    {
        return view('follows.followerList');
    }

    //サイドバーにフォロー数を表示
    public function followCounts()
    {
        dd("123");
        $follows = follow::where('following_id', Auth::id())->get(); // フォローしているユーザーのidを取得
        return view('follows.login', compact('follows'));
    }
}
