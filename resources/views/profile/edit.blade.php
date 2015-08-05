@extends('layouts.master')
@section('title', 'Edit profile')
@section('content')
    <h3>Edit profile.</h3>

    <form method="POST" action="/profile/update">
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
                <label for="first_name">First name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') ? old('first_name') : $profile->first_name }}">
            </li>
            <li>
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') ? old('last_name') : $profile->last_name }}">
            </li>
            <li>
                <label for="birth_date">Birth date</label>
                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') ? old('birth_date') : $profile->birth_date }}">
            </li>
            <li>
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="not specified" {{ (old('gender') ? old('gender') : $profile->gender) == 'not specified' ? 'selected="selected"' : '' }}>Not specified</option>
                    <option value="male" {{ (old('gender') ? old('gender') : $profile->gender) == 'male' ? 'selected="selected"' : '' }}>Male</option>
                    <option value="female" {{ (old('gender') ? old('gender') : $profile->gender) == 'female' ? 'selected="selected"' : '' }}>Female</option>
                    <option value="other" {{ (old('gender') ? old('gender') : $profile->gender) == 'other' ? 'selected="selected"' : '' }}>Other</option>
                </select>
            </li>
            <li>
                <label for="location">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location') ? old('location') : $profile->location }}">
            </li>
            <li>
                <label for="about_me">About me</label>
                <textarea name="about_me" id="about_me" rows="5" cols="20">{{ old('about_me') ? old('about_me') : $profile->about_me }}</textarea>
            </li>
            <li>
                <label for="website">Website</label>
                <input type="text" name="website" id="website" value="{{ old('website') ? old('website') : $profile->website }}">
            </li>
            <li>
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" id="facebook" value="{{ old('facebook') ? old('facebook') : $profile->facebook }}">
            </li>
            <li>
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" id="twitter" value="{{ old('twitter') ? old('twitter') : $profile->twitter }}">
            </li>
            <li>
                <label for="google+">Google+</label>
                <input type="text" name="google_plus" id="google_plus" value="{{ old('google_plus') ? old('google_plus') : $profile->google_plus }}">
            </li>
            <li>
                <button type="submit">Edit</button>
            </li>
        </ul>
    </form>
@endsection