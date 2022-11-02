<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile()
    {
        return view('users.profile');
    }


    public function search()
    {
        //dd("123");
        return view('users.search');
    }
    //検索機能
    public function searching(Request $request)
    {
        dd("123");
        $user = Auth::user(); //ログイン認証しているユーザーデータの取得
        $keyword = $request->input('keyword');
        $query = Post::query();
        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }
        $posts = $query->get();
        return redirect('search');
    }
}
