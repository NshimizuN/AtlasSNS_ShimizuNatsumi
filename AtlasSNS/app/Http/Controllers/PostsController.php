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
        $post = \DB::table('posts')  //postsテーブルから投稿(post)を取得
            ->orderBy('created_at', 'desc')  //新しい順に投稿を取得
            ->get();
        return view('posts.index', ['user' => $user, 'post' => $post]); // 現在認証しているユーザーを取得
    }

    //投稿を登録する機能
    public function create(Request $request) //createメソット
    {
        $post = $request->input('newPost'); //bladeから送られてきたidを受け取ってる
        \DB::table('posts')->insert([  //postsテーブルに指定
            'post' => $post,          //postカラムを持ってくる
            'user_id' => Auth::user()->id  //user_idカラムを持ってくる
        ]);

        return redirect('top');  //ルーティングするよ（URL）
        //return view('index');  //画面に表示するよ（投稿機能：表示× ルーティング○）
    }

    //投稿の編集処理
    public function update(Request $request)
    {
        //dd("123");
        $id = $request->input('id'); //bladeから送られてきたidを受け取ってる
        $up_post = $request->input('upPost'); //bladeから送られてきたupPost(編集内容)を受け取ってる
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
        return redirect('top');  //トップページへリダイレクト（URL）
    }

    //削除
    public function delete($id)
    {
        //dd("123");
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top'); //トップページへリダイレクト（URL）
    }
}
