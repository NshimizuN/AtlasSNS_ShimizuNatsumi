@extends('layouts.login')

@section('content')

<!--投稿フォーム-->
<div class="top-container">
  <div class="post-form">
    <div class="main-contentorm-icon">
      @if(Auth::user()->images == "dawn.png")
      <img src="/images/icon1.png" width="70" height="70">
      @else
      <img src=" {{ asset('storage/'.Auth::user()->images)}}" width="70" height="70">
      @endif
    </div>

    {!! Form::open(['url' => 'post/create']) !!}
    {{Form::token()}}

    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
    <button><input type="image" src="./images/post.png" alt="投稿" class="post-btn" width="80" height="80"></button>
    {!! Form::close() !!}
  </div>
</div>



<!--投稿リスト-->
<div class="bottom-container">

  <!--コントローラーから渡された複数のデータを表示する-->
  @foreach ($post as $post)
  <div class="post-container">
    <div class="post-info">
      <div class="post-user">
        <div class="post-icon">
          @if($post->user->images == "dawn.png")
          <img src="/images/icon1.png" width="50" height="50">
          @else
          <img src=" {{ asset('storage/'.$post->user->images)}}" width="50" height="50">
          @endif
        </div>
        <div class="post-name">{{$post->user->username}}</div>
      </div>
      <div class="post-time">{{$post->updated_at}}</div>
    </div>
    <div class="post">{{$post->post}}</div>
    <!--コントローラーから渡された複数のデータを表示する-->
    <!-- <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">更新</a></td>-->
    @if(Auth::user()->id == $post->user_id)
    <div class="btn-content">
      <!-- 投稿の編集ボタン -->
      <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="./images/edit.png" alt="編集" width="40" height="40"></a>
      <!-- 投稿の削除ボタン -->
      <a href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img class="btn-delete" src="./images/trash.png" alt="削除" width="44" height="44"></a>
    </div>
    @endif




    <!-- モーダルの中身 -->
    <div class=" modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="/post/update" method="">
          <!--コントローラーへのリンク-->
          <textarea name="upPost" class="modal_post"></textarea>
          <!--コントローラーへのリンク-->
          <input type="hidden" name="id" class="modal_id" value="">
          <input type="image" class="modai__btn" src="./images/edit.png" width="50" height="50">
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
  @endforeach

</div>


@endsection
