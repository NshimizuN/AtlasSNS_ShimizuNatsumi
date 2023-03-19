<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Auth認証に必要な記述
use Illuminate\Support\Facades\Validator; //バリデーショん
use App\Post; //投稿機能追記

class PostsController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    //トップ画面を表示
    public function index(Post $posts)
    {
        $following_id = Auth::user()->follows()->pluck('followed_id'); // フォローしているユーザーのidを取得
        //dd($following_id);
        $post = Post::orderBy('updated_at', 'desc') //編集された順
            ->with('user')->whereIn('user_id', $following_id) //userフォローしている人を取得
            ->orWhere('user_id', Auth::user()->id) //またはログインユーザーのidを取得
            ->get(); //取得する
        return view('posts.index', ['post' => $post]); // 現在認証しているユーザーを取得
    }


    //投稿を登録する機能
    public function create(Request $request) //createメソット
    {
        $validator = Validator::make($request->all(), [
            'newPost' => 'required|string|min:1|max:200',
        ]); //バリデーション
        $post = $request->input('newPost'); //bladeから送られてきたidを受け取ってる
        \DB::table('posts')->insert([  //postsテーブルに指定
            'post' => $post,          //postカラムを持ってくる
            'user_id' => Auth::user()->id,  //user_idカラムを持ってくる
        ]);
        $validator->validate(); //バリデーションを適用
        return redirect('top');  //ルーティングするよ（URL）
        //return view('index');  //画面に表示するよ（投稿機能：表示× ルーティング○）
    }

    //投稿の編集処理
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upPost' => 'required|string|min:1|max:200',
        ]); //バリデーション
        $id = $request->input('id'); //bladeから送られてきたidを受け取ってる
        $up_post = $request->input('upPost'); //bladeから送られてきたupPost(編集内容)を受け取ってる
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
        $validator->validate(); //バリデーションを適用
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


    //followerListへフォローされてる人のつぶやきを表示
    public function followerShow()
    {
        //dd("123");
        // Postモデル経由でpostsテーブルのレコードを取得
        $followed_id = Auth::user()->followers()->pluck('followed_id'); // フォローされているユーザーのidを取得
        //dd($followed_id);
        $posts = Post::orderBy('updated_at', 'desc')->with('user')->whereIn('user_id', $followed_id)->get(); // フォローされているユーザーのidを元に投稿内容を取得
        return view('follows.followerList', compact('posts'));
    }
}
