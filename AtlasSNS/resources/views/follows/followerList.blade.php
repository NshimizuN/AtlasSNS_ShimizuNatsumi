@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follower-list']) !!}

@foreach($posts as $post)
<td>名前：{{ $post->user->username }}</td>
<td>投稿内容：{{ $post->post }}</td>
<td>{{$post->updated_at}}</td>
@endforeach



@endsection
