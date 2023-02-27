@extends('layouts.login')

<div class="container">
  @section('content')

  <div class="edit-container">
    <form action="/profile/update" method="post" enctype="multipart/form-data">
      @csrf

      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach

      <!--アイコン-->
      <div class="edit-icon">
        @if(Auth::user()->images == "dawn.png")
        <img src="/images/icon1.png" width="70" height="70">
        @else
        <img src=" {{ asset('storage/'.Auth::user()->images)}}" width="70" height="70">
        @endif
      </div>

      <div class="edit-list">
        <!--入力フォーム-->

        <div class="ct-block">
          <label class="contact-text" for="name">{{ Form::label('username') }}</label>
          {{ Form::text('username',null,['class' => 'input-name', 'placeholder' => Auth::user()->username]) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="name">{{ Form::label('mail address') }}</label>
          {{ Form::text('mail',null,['class' => 'input-address', 'placeholder' => Auth::user()->mail]) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="name"> {{ Form::label('password') }}</label>
          {{ Form::text('password',null,['class' => 'input-pass1']) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="name">{{ Form::label('password comfirm') }}</label>
          {{ Form::text('password_confirmation',null,['class' => 'input-pass2']) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="name">{{ Form::label('bio') }}</label>
          {{ Form::text('bio',null,['class' => 'input-bio','placeholder' => Auth::user()->bio]) }}
        </div>

        <div class="ct-block">
          <label class="contact-text" for="images">{{ Form::label('icon image') }}</label>
          {{ Form::file('imgpath',null,['class' => 'input-image']) }}
        </div>

        {{ Form::submit('更新',['class' => 'update-button']) }}
      </div>
    </form>

  </div>
  @endsection
</div>
