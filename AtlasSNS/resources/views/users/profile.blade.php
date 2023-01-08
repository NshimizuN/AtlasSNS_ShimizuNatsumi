@extends('layouts.login')

@section('content')

<form action="/profile" method="get">

  <div class="ct-block">
    <label class="contact-text" for="name">{{ Form::label('username') }}</label>
    {{ Form::text('username',null,['class' => 'input', 'placeholder' => 'admin']) }}
  </div>

  <div class="ct-block">
    <label class="contact-text" for="name">{{ Form::label('mail address') }}</label>
    {{ Form::text('mail',null,['class' => 'input', 'placeholder' => '']) }}
  </div>

  <div class="ct-block">
    <label class="contact-text" for="name"> {{ Form::label('password') }}</label>
    {{ Form::text('password',null,['class' => 'input']) }}
  </div>

  <div class="ct-block">
    <label class="contact-text" for="name">{{ Form::label('password comfirm') }}</label>
    {{ Form::text('password_confirmation',null,['class' => 'input']) }}
  </div>

  <div class="ct-block">
    <label class="contact-text" for="name">{{ Form::label('bio') }}</label>
    {{ Form::text('bio',null,['class' => 'input']) }}
  </div>

  <div class="ct-block">
    <label class="contact-text" for="name">{{ Form::label('icon image') }}</label>
    {{ Form::file('images',null,['class' => 'form-control']) }}
  </div>

  {{ Form::submit('更新',['class' => 'button']) }}

  {!! Form::close() !!}
  @endsection
