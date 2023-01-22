  @extends('layouts.login')


  @section('content')
  {!! Form::open(['url' => '/follow-list']) !!}

  <!--フォローアイコン-->
  @foreach($following_users as $following_user)
  <!--$userから$follow_userを抽出-->
  <div>
    @if($following_user->images == "dawn.png")
    <img src="/images/icon1.png">
    @else
    <img src=" {{ asset('storage/'.$following_user->images)}}">
    @endif
  </div>
  @endforeach

  <!--フォローリスト-->
  @foreach($posts as $post)
  <!--$postsから$postを抽出-->
  </div>
  <p>名前：{{ $post->user->username }}</p>
  <p>投稿内容：{{ $post->post }}</p>
  <p>{{$post->updated_at}}</p>
  @endforeach

  @endsection



  </html>
