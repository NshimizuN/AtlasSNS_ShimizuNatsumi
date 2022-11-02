<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    //フォローリスト
    public function followList()
    {
        //dd("123");
        return view('follows.followList');
    }

    //フォロワーリスト
    public function followerList()
    {
        return view('follows.followerList');
    }
}
