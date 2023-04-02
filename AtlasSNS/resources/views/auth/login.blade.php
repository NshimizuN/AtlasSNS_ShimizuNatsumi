@extends('layouts.logout')

@section('content')
{!! Form::open(['url' => '/login']) !!}

<secition id="login-content">
  <div class="login-form">
    <div class="login-content">
      <p class="ja-title">AtlasSNSへようこそ</p>

      <div class="login-block">
        <label class="contact-text" for="name">{{ Form::label('mail address') }}</label>
        {{ Form::text('mail',null,['class' => 'input']) }}
      </div>

      <div class="login-block">
        <label class="contact-text" for="name">{{ Form::label('password') }}</label>
        {{ Form::password('password',['class' => 'input']) }}
      </div>

      {{Form::submit('LOGIN',['class' => 'button']) }}

      <p class="regster-btn"><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
  </div>
</secition>

{!! Form::close() !!}

@endsection
