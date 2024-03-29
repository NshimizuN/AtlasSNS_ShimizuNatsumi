  @extends('layouts.login')
  @section('content')

  <div class="followers-container">
    {!! Form::open(['url' => '/user-profile']) !!}

    <!--ユーザープロフィール-->
    <div class="top-container">
      <div class="user-bio">
        @foreach($users as $user)
        <div class="user-icon">
          @if($user->images == "dawn.png")
          <img src="/images/icon1.png" alt="初期アイコン" width="70" height="70">
          @else
          <img src=" {{ asset('storage/'.$user->images)}}" alt="アイコン" width="70" height="70">
          @endif
        </div>

        <div class="user-contents">
          <p class="prf-name"><span class="mgr-50">name</span> {{ $user->username }}</p>
          <p class="prf-bio"><span class="mgr-60">bio</span> {{ $user->bio }}</p>
        </div>
        <!--フォローボタン-->
        <div class="userfollowbtn-box">
          @if(Auth::id() != $user->id)
          <ul>
            <li>
              @if (auth()->user()->isFollowing($user->id))
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <p class="userunfollow-btn"><a href="/search/{{$user->id}}/unfollow">フォロー解除</a>

                @else
                {{ csrf_field() }}
              <p class="userfollow-btn"><a href="/search/{{$user->id}}/follow">フォローする</a></p>
              @endif
            </li>
          </ul>
          @endif
        </div>
      </div>
      @endforeach
    </div>

    <!--ユーザーの投稿-->
    <div class="bottom-container">

      @foreach($posts as $post)
      <div class="post-container">
        <div class="post-info">
          <div class="post-user">
            <div class="post-icon">
              @if($post->user->images == "dawn.png")
              <img src="/images/icon1.png" alt="初期アイコン" width="50" height="50">
              @else
              <img src=" {{ asset('storage/'.$post->user->images)}}" alt="アイコン" width="50" height="50">
              @endif
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
