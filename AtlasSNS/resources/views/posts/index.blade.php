@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
{{session('id')}}
<div style="width:50%; margin: 0 auto; text-align:center;">
  <form action="{{ route('post.store') }}" method="POST">
    <!--トークンのやつ-->
    @csrf
    <!--トークンのやつ-->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div>
      <textarea name="content" placeholder="内容の入力"></textarea>
    </div>
    <button>送信</button>
  </form>
</div>

@endsection
