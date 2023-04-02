@extends('layouts.logout')

@section('content')

<secition id="added-content">
  <div class="login-form">
    <div class="login-content">
      <div class="wellcom">
        <p>{{session('username')}} さん</p>
        <p>ようこそ！AtlasSNSへ！</p>
      </div>
      <div class="completion">
        <p>ユーザー登録が完了しました。</p>
        <p>早速ログインをしてみましょう。</p>
      </div>
      <p class="login-btn"><a href="/login">ログイン画面へ</a></p>
    </div>
  </div>
</secition>

@endsection
