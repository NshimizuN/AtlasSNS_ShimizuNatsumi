<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post; //投稿機能追記

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

    //投稿を表示する
    public function create()
    {
        return view('post/create');
    }

    //投稿機能
    //public function store(Request $request)
    public function store(Request $request)
    {
        $this->validate($request, [
            'post' => 'required|min:1|max:200',
        ]);

        //$post = new Post;
        //$post->id = $request->id;
        //$post->id = $request->session()->get('id');
        //$post->user_id = $request->user_id;
        $post->user_id = Auth::user()->id;  //ユーザーIDの受け渡し
        //$post->post = $request->post;
        //$post->save();

        //return redirect()->route('post.create');

        $post = $request->input('newPost');
        \DB::table('posts')->insert([
            'post' => $post
        ]);

        //return redirect('index');
        return view('index');
    }
}
