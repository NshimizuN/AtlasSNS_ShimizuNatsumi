@extends('layouts.login')
@section('content')


<div class="search-container">

  {!! Form::open(['url' => '/search']) !!}

  <!--検索機能-->
  <div class="top-container">
    <div class="search-container">
      <form action="/search" method="GET">
        @csrf
        <input type="text" class="search-form" name="keyword" value="{{ $keyword }}" placeholder="ユーザー名">
        <button type="submit" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        <div class="search-word">
          @if(isset( $keyword ))
          <p class="word">検索ワード：{{$keyword}}</p>
          @else
          @endif
        </div>
      </form>
    </div>
  </div>
  {!! Form::close() !!}

  <!--検索結果リスト、フォローボタン-->
  <div class="bottom-container">
    <div class="user-box">

      @foreach($users as $user)

      <div class="search-icon">
        @if($user->images == "dawn.png")
        <img src="/images/icon1.png" width="70" height="70">
        @else
        <img src=" {{ asset('storage/'.$user->images)}}" width="70" height="70">
        @endif
      </div>

      <div class="search-name">
        {{$user -> username}}
      </div>

      <div class="followbtn-box">
        @if(Auth::id() != $user->id)
        <ul class="follows-btn">
          <li>
            @if (auth()->user()->isFollowing($user->id))
            <p class="unfollow-btn"><a href="/search/{{$user->id}}/unfollow">フォロー解除</a>
              @else
            <p class="follow-btn"><a href="/search/{{$user->id}}/follow">フォローする</a></p>
            @endif
          </li>
        </ul>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
