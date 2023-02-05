  @extends('layouts.login')


  @section('content')

  {!! Form::open(['url' => '/user-profile']) !!}

  <div>
    @foreach($users as $user)
    @if($user->images == "dawn.png")
    <img src="/images/icon1.png" width="50" height="50">
    @else
    <img src=" {{ asset('storage/'.$user->images)}}" width="50" height="50">
    @endif
    <p>{{ $user->username }}</p>
    <p>{{ $user->bio }}</p>
    @if (auth()->user()->isFollowing($user->id))
    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <p class="unfollow-btn"><a href="/userProfile/{{$user->id}}/unfollow">フォロー解除</a>
    </form>

    @else
    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
      {{ csrf_field() }}

      <p class="follow-btn"><a href="/userProfile/{{$user->id}}/follow">フォローする</a></p>
    </form>
    @endif
  </div>

  <div>
    @foreach($posts as $post)

    @if($post->user->images == "dawn.png")
    <img src="/images/icon1.png" width="50" height="50">
    @else
    <img src=" {{ asset('storage/'.$post->user->images)}}" width="50" height="50">
    @endif

    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    <p>{{$post->updated_at}}</p>

  </div>

  @endforeach

  @endsection



  </html>
