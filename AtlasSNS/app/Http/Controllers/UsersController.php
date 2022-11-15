<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Auth認証に必要な記述

class UsersController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user(); //ログイン認証しているユーザーデータの取得
        return view('users.profile');
    }

    //検索機能
    public function search(Request $request)
    {
        //dd("123");
        $user = Auth::user(); //ログイン認証しているユーザーデータの取得
        //$followlist = \DB::table('follows')
        //   ->where('following_id', '=', Auth::user()->id)
        //  ->get();
        $keyword = $request->input('keyword'); //入力した検索ワードを取得
        $query = \DB::table('users'); //usersテーブルを取得
        if (!empty($keyword)) {  //もしキーワードがあったら
            $query->where('username', 'LIKE', "%{$keyword}%") //カラムからキーワードを取得
                ->where('id', '!=', Auth::user()->id);  //自分を除く
        } else {
            $query
                ->where('id', '!=', Auth::user()->id); //自分を除く
        };
        $users = $query->get();  //メソッドを代入
        return view('users.search', ['keyword' => $keyword, 'users' => $users]);  //検索ワード、ユーザーを表示させる（bladeへ渡す）
    }
}
