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
        return view('posts.index'); // 現在認証しているユーザーを取得
        $user = Auth::user(); //ユーザー名のセッションの取得
        $username = Auth::username(); // 現在認証しているユーザー名を取得
    }
}
