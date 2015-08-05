@extends('guest')
@section('content')
    <form method="POST" action="/auth/login">
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
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" id="password">
            </li>
            <li>
                <button type="submit">Login</button>
            </li>
        </ul>
    </form>
@endsection