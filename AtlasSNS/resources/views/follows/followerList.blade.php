@extends('layouts.login')
@section('content')


<div class="followers-container">

  {!! Form::open(['url' => '/follower-list']) !!}

  <!--フォロワーアイコン-->
  <div class="top-container">
    <div class="follower-list">
      <h2>Follower list</h2>
      <div class="follower-box">
        <div class="follower-iconbox">
          @foreach($followed_users as $followed_user)
          <!--$userから$followed_userを抽出-->
          @if($followed_user->images == "dawn.png")
          <img src="/images/icon1.png" width="70" height="70">
          @else
          <img src=" {{ asset('storage/'.$followed_user->images)}}" width="70" height="70">
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>


  <!--フォロワーリスト-->
  <div class="bottom-container">

    <!--$postsから$postを抽出-->
    @foreach($posts as $post)
    <div class="post-container">
      <div class="post-info">
        <div class="post-user">
          <div class="post-icon">
            <a href="{{ route('user-profile', ['id' => $post->user->id]) }}">
              @if($post->user->images == "dawn.png")
              <img src="/images/icon1.png" width="50" height="50">
              @else
              <img src=" {{ asset('storage/'.$post->user->images)}}" width="50" height="50">
              @endif
            </a>
          </div>
          <div class="post-name">{{ $post->user->username }}</div>
        </div>
        <div class="post-time">{{$post->updated_at}}</div>
      </div>
      <div class="post">{{ $post->post }}</div>
    </div>
    @endforeach
  </div>
</div>
@endsection
