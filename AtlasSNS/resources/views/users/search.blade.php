@extends('layouts.login')

@section('content')

<!--検索機能-->
{!! Form::open(['url' => '/search']) !!}
<div id="search">
  <form action="/search" method="GET">
    @csrf
    <input type="text" name="keyword" value="{{ $keyword }}" placeholder="ユーザー名">
    <input type="submit" name="submit" value="検索">
    @if(isset( $keyword ))
    <p>検索ワード：{{$keyword}}</p>
    @else
    @endif
  </form>
</div>
{!! Form::close() !!}

<!--検索結果リスト、フォローボタン-->
<div id="search-list">
  @foreach($users as $user)
  @if(Auth::id() != $user->id)
  <ul>

    <li>
      {{$user -> username}}
      <p class="follow-btn"><a href="/search/{{$user->id}}/follow">フォローする</a></p>

      <p class="unFollow-btn"><a href="/search/{{$user->id}}/unFollow">フォロー解除</a></p>


    </li>
  </ul>
  @endif
  @endforeach
</div>





@endsection
