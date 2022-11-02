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
  <!-- <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">更新</a></td>-->
  <div class="content">
    <!-- 投稿の編集ボタン -->
    <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="image/post.png" alt="編集"></a>
  </div>
  <!-- 投稿の削除ボタン -->
  <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="image/trash-h.png" alt="削除"></a></td>
  @endforeach
  <!-- モーダルの中身 -->
  <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      <form action="/post/update" method="">
        <!--コントローラーへのリンク-->
        <textarea name="upPost" class="modal_post"></textarea>
        <!--コントローラーへのリンク-->
        <input type="hidden" name="id" class="modal_id" value="">
        <input type="submit" value="更新">
        {{ csrf_field() }}
      </form>
      <a class="js-modal-close" href="">閉じる</a>
    </div>
  </div>


</div>


@endsection
