  @extends('layouts.login')

  <div class="followers-container">

    @section('content')
    {!! Form::open(['url' => '/user-profile']) !!}

    <!--ユーザープロフィール-->
    <div class="top-container">
      @foreach($users as $user)
      <div class="user-icon">
        @if($user->images == "dawn.png")
        <img src="/images/icon1.png" width="50" height="50">
        @else
        <img src=" {{ asset('storage/'.$user->images)}}" width="50" height="50">
        @endif
      </div>

      <div class="user-contents">
        <p>{{ $user->username }}</p>
        <p>{{ $user->bio }}</p>
      </div>
      <!--フォローボタン-->
      <div class="bottom-container">
        @if(Auth::id() != $user->id)
        <ul>
          <li>
            @if (auth()->user()->isFollowing($user->id))
            <form action="{{ route('userunfollow', ['id' => $user->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <p class="userunfollow-btn"><a href="/user-profile/{{$user->id}}/userunfollow">フォロー解除</a>
            </form>

            @else
            <form action="{{ route('userfollow', ['id' => $user->id]) }}" method="POST">
              {{ csrf_field() }}

              <p class="userfollow-btn"><a href="/user-profile/{{$user->id}}/userfollow">フォローする</a></p>
            </form>
            @endif
          </li>
        </ul>
        @endif
      </div>
    </div>
    @endforeach
  </div>

  <!--ユーザーの投稿-->
  @foreach($posts as $post)

  <div class="bottom-container">
    <div class="post-container">
      <div class="user-profile">
        <div class="post-icon">
          @if($post->user->images == "dawn.png")
          <img src="/images/icon1.png" width="50" height="50">
          @else
          <img src=" {{ asset('storage/'.$post->user->images)}}" width="50" height="50">
          @endif
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
