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
          {{ Form::file('imgpath',['class' => 'input-form']) }}
          <div id="upload-area" style="cursor: pointer; text-align:center; padding: 10px; border-radius:4px; font-size:small; border:solid 1px #eee;" onclick="$('#upload-form-fileselect').click()">
            ファイルを選択<br />
          </div>
        </div>

        {{ Form::submit('更新',['class' => 'update-button']) }}
      </div>
    </form>

  </div>
  @endsection
</div>
