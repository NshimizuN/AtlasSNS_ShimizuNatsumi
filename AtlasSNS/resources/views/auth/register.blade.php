@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

<section id="register-content">
  <div class="register-form">
    <div class="login-content">
      <p class="register-title">新規ユーザー登録</p>

      <div class="register-block">
        <label class="contact-text" for="name">{{ Form::label('user name') }}</label>
        {{ Form::text('username',null,['class' => 'input', 'placeholder' => 'admin']) }}
      </div>

      <div class="register-block">
        <label class="contact-text" for="name">{{ Form::label('mail address') }}</label>
        {{ Form::text('mail',null,['class' => 'input', 'placeholder' => 'xxx@atlas.com']) }}
      </div>

      <div class="register-block">
        <label class="contact-text" for="name"> {{ Form::label('password') }}</label>
        {{ Form::password('password',['class' => 'input']) }}
      </div>

      <div class="register-block">
        <label class="contact-text" for="name">{{ Form::label('password confim') }}</label>
        {{ Form::password('password_confirmation',['class' => 'input']) }}
      </div>

      {{ Form::submit('REGSTER',['class' => 'button']) }}

      <p class="next-btn"><a href="/login">ログイン画面へ戻る</a></p>
    </div>
  </div>
  </secition>

  {!! Form::close() !!}


  @endsection
