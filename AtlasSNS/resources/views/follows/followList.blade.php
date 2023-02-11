  @extends('layouts.login')


  <div class="follows-container">

    @section('content')
    {!! Form::open(['url' => '/follow-list']) !!}


    <!--フォローアイコン-->
    <div class="top-container">
      <h1 class="followlist">Follow list</h1>
      <div class="follow-iconbox">
        @foreach($following_users as $following_user)
        <!--$userから$follow_userを抽出-->
        @if($following_user->images == "dawn.png")
        <img src="/images/icon1.png" width="70" height="70">
        @else
        <img src=" {{ asset('storage/'.$following_user->images)}}" width="70" height="70">
        @endif
        @endforeach
      </div>
    </div>

    <!--フォローリスト-->
    @foreach($posts as $post)
    <!--$postsから$postを抽出-->
    <div class="bottom-container">
      <div class="post-container">
        <div class="follow">
          <div class="post-icon">
            <a href="{{ route('user-profile', ['id' => $post->user->id]) }}">
              @if($post->user->images == "dawn.png")
              <img src="/images/icon1.png" width="50" height="50">
              @else
              <img src=" {{ asset('storage/'.$post->user->images)}}" width="50" height="50">
              @endif
          </div>
          </a>
          <div class="post-time">{{$post->updated_at}}</div>
          <div class="post-name">{{ $post->user->username }}</div>
          <div class="post">{{ $post->post }}</div>
        </div>
        @endforeach
      </div>
    </div>

    @endsection


    </html>
