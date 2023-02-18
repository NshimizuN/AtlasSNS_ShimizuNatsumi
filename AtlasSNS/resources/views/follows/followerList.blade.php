@extends('layouts.login')

<div class="container">

  @section('content')
  {!! Form::open(['url' => '/follower-list']) !!}

  <!--フォロワーアイコン-->
  <div class="top-container">
    <h2 class="followerlist">Follower list</h2>
    <div class="follower-iconbox">
      @foreach($followed_users as $followed_user)
      <!--$userから$followed_userを抽出-->
      @if($followed_user->images == "dawn.png")
      <img src="/images/icon1.png">
      @else
      <img src=" {{ asset('storage/'.$followed_user->images)}}">
      @endif
      @endforeach
    </div>
  </div>

  <!--フォロワーリスト-->
  @foreach($posts as $post)
  <!--$postsから$postを抽出-->

  <div class="bottom-container">
    <div class="post-container">
      <div class="follower">
        <div class="post-icon">
          <a href="{{ route('user-profile', ['id' => $post->user->id]) }}">
            @if($post->user->images == "dawn.png")
            <img src="/images/icon1.png" width="50" height="50">
            @else
            <img src=" {{ asset('storage/'.$post->user->images)}}" width="50" height="50">
            @endif
          </a>
        </div>
        <div class="post-time">{{$post->updated_at}}</div>
        <div class="post-name">{{ $post->user->username }}</div>
        <div class="post">{{ $post->post }}</div>
      </div>

      @endforeach

      @endsection
    </div>
  </div>

  </html>
