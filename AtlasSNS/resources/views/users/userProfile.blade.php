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
            {{$user -> username}}
            @if (auth()->user()->isFollowing($user->id))
            <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <p class="unfollow-btn"><a href="/user-profile/{{$user->id}}/unfollow">フォロー解除</a>
            </form>

            @else
            <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
              {{ csrf_field() }}

              <p class="follow-btn"><a href="/user-profile/{{$user->id}}/follow">フォローする</a></p>
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
    @if($post->user->images == "dawn.png")
    <img src="/images/icon1.png" width="50" height="50">
    @else
    <img src=" {{ asset('storage/'.$post->user->images)}}" width="50" height="50">
    @endif

    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    <p>{{ $post->updated_at }}</p>
  </div>

  @endforeach

  @endsection
  </div>

  </html>
