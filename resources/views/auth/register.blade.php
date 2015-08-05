@extends('guest')
@section('content')
    <form method="POST" action="/auth/register">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! csrf_field() !!}

        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </li>
            <li>
                <label for="confirm-password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </li>
            <li>
                <button type="submit">Register</button>
            </li>
        </ul>
    </form>
@endsection