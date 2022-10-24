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

    //トップ画面を表示
    public function index()
    {
        $user = Auth::user(); //ログイン認証しているユーザーデータの取得
        $post = \DB::table('posts')->get();  //postsテーブルから投稿(post)を取得
        return view('posts.index', ['user' => $user, 'post' => $post]); // 現在認証しているユーザーを取得
    }

    //投稿を登録する機能
    public function create(Request $request) //createメソット
    {
        $post = $request->input('newPost');
        \DB::table('posts')->insert([  //postsテーブルに指定
            'post' => $post,          //postカラムを持ってくる
            'user_id' => Auth::user()->id  //user_idカラムを持ってくる
        ]);

        return redirect('top');  //ルーティングするよ（URL）
        //return view('index');  //画面に表示するよ（投稿機能：表示× ルーティング○）
    }

    //投稿の編集を表示
    public function updateForm($id)
    {
        //dd("123");
        $post = \DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', compact('post'));
    }

    //投稿の編集処理
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
        return redirect('index');
    }

    //削除
    public function delete($id)
    {
        //dd("123");
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('index');
    }
}
