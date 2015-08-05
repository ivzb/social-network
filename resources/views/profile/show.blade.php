@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <h3>{{ $user->username }}'s profile</h3>

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
@endsection