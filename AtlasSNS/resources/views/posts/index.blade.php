@extends('layouts.login')

@section('content')
<div class="container">
  <h2>機能を実装していきましょう</h2>
  {!! Form::open(['url' => 'post/create']) !!}
  {{Form::token()}}
  <div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
  </div>
  <button type="submit" class="btn btn-success pull-right">追加</button>
  {!! Form::close() !!}

  <!--コントローラーから渡された複数のデータを表示する-->
  @foreach ($post as $post)
  <td>{{$post->post}}</td>
  <!--コントローラーから渡された複数のデータを表示する-->
  <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">更新</a></td>
  <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
  @endforeach



</div>


@endsection
