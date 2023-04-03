@extends('layouts.logout')

@section('content')

<div class="added-content">
  <div class="added-box">
    <div class="text-1">
      <p>{{session('username')}} さん<br>ようこそ！AtlasSNSへ！</p>
    </div>
    <div class="text-2">
      <p>ユーザー登録が完了しました。<br>早速ログインをしてみましょう。</p>
    </div>
    <p class="login-btn"><a href="/login">ログイン画面へ</a></p>
  </div>
</div>

@endsection
