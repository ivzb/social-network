@extends('layouts.auth')
@section('title', 'login')
@section('content')
    @if (count($errors) > 0)
        <div class="auth-errors">
            <h2><strong>Whoops!</strong> There were some problems.<br><br></h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <h1>Hi!</h1>
    @endif

    {!! Form::open(array('action' => 'Auth\AuthController@postLogin')) !!}
    {!! Form::text('email', old('email') , [ 'placeholder' => 'Email' ]) !!}
    {!! Form::password('password', [ 'placeholder' => 'Password' ]) !!}
    {!! Form::submit('Login', [ 'id' => 'login-button']) !!}
    {!! Form::close() !!}
@endsection