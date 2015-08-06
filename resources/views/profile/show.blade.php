@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <h2>{{ $profile->user->username }}'s profile</h2>

    <h3>About</h3>
    <ul>
        <li>
            <span>First name: {{ $profile->first_name }}</span>
        </li>
        <li>
            <span>Last name: {{ $profile->last_name }}</span>
        </li>
        <li>
            <span>Birth date: {{ $profile->birth_date }}</span>
        </li>
        <li>
            <span>Gender: {{ $profile->gender }}</span>
        </li>
        <li>
            <span>Location: {{ $profile->location }}</span>
        </li>
        <li>
            <span>About me: {{ $profile->about_me }}</span>
        </li>
        <li>
            <span>Website: {{ $profile->website }}</span>
        </li>
        <li>
            <span>Facebook: {{ $profile->facebook }}</span>
        </li>
        <li>
            <span>Twitter: {{ $profile->twitter }}</span>
        </li>
        <li>
            <span>Google+: {{ $profile->google_plus }}</span>
        </li>
    </ul>

    <hr />

    {!! Form::open(array('action' => 'PostController@store')) !!}
        {!! Form::textarea('post_content', null, ['placeholder' => 'What\'s on your mind?']) !!}
        {!! Form::hidden('recipient_user_id', $user->id) !!}
        {!! Form::submit('Post') !!}
    {!! Form::close() !!}

    <hr />

    @foreach ($posts as $post)
        <ul>
            <li>author: <a href="/profile/{{ $post->author->username }}">{{ $post->author->username }}</a></li>
            <li>recipient: <a href="/profile/{{ $post->recipient->username }}">{{ $post->recipient->username }}</a></li>
            <li>content: {{ $post->content }}</li>
            <li>created at: {{ $post->created_at }}</li>
        </ul>

        <hr />
    @endforeach
@endsection