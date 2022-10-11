<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $user = Auth::user(); //ログイン認証しているユーザーの取得
        $username = Auth::user()->username;
        return view('posts.index'); // 現在認証しているユーザーを取得
    }
}
