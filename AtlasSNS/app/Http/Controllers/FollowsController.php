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
        $follower = auth()->user();
        $request = request('id');
         \DB::table('follows')
        $is_following = $follower->is_Following($id);
        if (!$is_following) {
            $follower->follow($id);
            return redirect('search');
        }
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
