@extends('layouts.login')

<div class="followers-container">

  @section('content')
  {!! Form::open(['url' => '/follower-list']) !!}

  <!--フォロワーアイコン-->
  <div class="top-container">
    <h1 class="followerlist">Follower list</h1>
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
    <a href="{{ route('user-profile', ['id' => $post->user->id]) }}">
      @if($post->user->images == "dawn.png")
      <img src="/images/icon1.png" width="50" height="50">
      @else
      <img src=" {{ asset('storage/'.$post->user->images)}}" width="50" height="50">
      @endif
    </a>
    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    <p>{{$post->updated_at}}</p>
  </div>

  @endforeach

  @endsection
</div>

</html>
