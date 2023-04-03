@extends('layouts.login')
@section('content')

<div class="edit-container">
  <form action="/profile/update" method="post" enctype="multipart/form-data">
    @csrf

    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach

    <div class="edit-box">

      <!--アイコン-->
      @if(Auth::user()->images == "dawn.png")
      <img src="/images/icon1.png" alt="初期アイコン" width="70" height="70">
      @else
      <img src=" {{ asset('storage/'.Auth::user()->images)}}" alt="アイコン" width="70" height="70">
      @endif

      <div class="edit-list">
        <!--入力フォーム-->

        <div class="ct-block">
          <label class="contact-text" class="name">{{ Form::label('username') }}</label>
          {{ Form::text('username',Auth::user()->username,['class' => 'input-form']) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="name">{{ Form::label('mail address') }}</label>
          {{ Form::text('mail',Auth::user()->mail ,['class' => 'input-form']) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="name"> {{ Form::label('password') }}</label>
          {{ Form::password('password',['class' => 'input-form']) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="name">{{ Form::label('password comfirm') }}</label>
          {{ Form::password('password_confirmation',['class' => 'input-form']) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="name">{{ Form::label('bio') }}</label>
          {{ Form::text('bio',Auth::user()->bio,['class' => 'input-form']) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="images">{{ Form::label('icon image') }}</label>
          {{ Form::file('imgpath',['class' => 'image-form']) }}
        </div>

        <div class="update-box">
          {{ Form::submit('更新',['class' => 'update-btn']) }}
        </div>

      </div>
    </div>

</div>

@endsection
