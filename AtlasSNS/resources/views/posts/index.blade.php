@extends('layouts.login')

@section('content')
<div class="container">
  {!! Form::open(['url' => 'post/create']) !!}
  {{Form::token()}}
  <div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
    <button><input type="image" src="./images/post.png" alt="投稿" width="80" height="80"></button>
  </div>
  {!! Form::close() !!}

  <div class="view-container">
    <!--コントローラーから渡された複数のデータを表示する-->
    @foreach ($post as $post)
    <p>{{$post->user->username}}</p>
    <p>{{$post->post}}</p>
    <p>{{$post->updated_at}}</p>
    <!--コントローラーから渡された複数のデータを表示する-->
    <!-- <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">更新</a></td>-->
    @if(Auth::user()->id == $post->user_id)
    <div class="content">
      <!-- 投稿の編集ボタン -->
      <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="./images/edit.png" alt="編集" width="30" height="30"></a>
      <!-- 投稿の削除ボタン -->
      <a class="" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="./images/trash-h.png" alt="削除" width="50.25" height="49.5"></a>
    </div>
    @endif
    @endforeach
    <!-- モーダルの中身 -->
    <div class=" modal js-modal">
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

</div>


@endsection
