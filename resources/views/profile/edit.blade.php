@extends('layouts.master')
@section('title', 'Edit profile')
@section('content')
    @include('layouts.logged-navigation', ['current_page' => 'settings'])

    <div class="page-header">
        <h2>Edit profile</h2>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>About</strong></div>
                <div class="panel-body">
                    {!! Form::open(array('action' => 'ProfileController@update')) !!}
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

                    <div class="row">
                        <div class="col-md-6">
                            <li class="list-group-item">
                                <label for="first_name">First name:</label>
                                {!! Form::text(
                                    'first_name',
                                    old('first_name') ? old('first_name') : $profile->first_name,
                                    [
                                        'placeholder' => 'First name',
                                        'class' => 'form-control',
                                        'id' => 'first_name'
                                    ]
                                ) !!}
                            </li>

                            <li class="list-group-item">
                                <label for="last_name">Last name:</label>
                                {!! Form::text(
                                    'last_name',
                                    old('last_name') ? old('last_name') : $profile->last_name,
                                    [
                                        'placeholder' => 'Last name',
                                        'class' => 'form-control',
                                        'id' => 'last_name'
                                    ]
                                ) !!}
                            </li>

                            <li class="list-group-item">
                                <label for="birth_date">Birth date:</label>
                                {!! Form::date(
                                    'birth_date',
                                    old('birth_date') ? old('birth_date') : $profile->birth_date,
                                    [
                                        'class' => 'form-control',
                                        'id' => 'birth_date'
                                    ]
                                ) !!}
                            </li>

                            <li class="list-group-item">
                                <label for="gender">Gender:</label>
                                {!! Form::select(
                                        'gender',
                                        [
                                            'not specified' => 'Not specified',
                                            'male' => 'Male',
                                            'female' => 'Female',
                                            'other' => 'Other'
                                        ],
                                        old('gender') ? old('gender') : $profile->gender,
                                        [
                                            'class' => 'form-control',
                                            'id' => 'gender'
                                        ]
                                ) !!}
                            </li>

                            <li class="list-group-item">
                                <label for="about_me">About:</label>
                                {!! Form::textarea(
                                    'about_me',
                                    old('about_me') ? old('about_me') : $profile->about_me,
                                    [
                                        'placeholder' => 'About me...',
                                        'class' => 'form-control',
                                        'id' => 'about_me',
                                        'rows' => 3
                                    ]
                                ) !!}
                            </li>
                        </div>

                        <div class="col-md-6">
                            <li class="list-group-item">
                                <label for="location">Location:</label>
                                {!! Form::text(
                                    'location',
                                    old('location') ? old('location') : $profile->location,
                                    [
                                        'placeholder' => 'Location',
                                        'class' => 'form-control',
                                        'id' => 'location'
                                    ]
                                ) !!}
                            </li>

                            <li class="list-group-item">
                                <label for="website">Website:</label>
                                {!! Form::text(
                                    'website',
                                    old('website') ? old('website') : $profile->website,
                                    [
                                        'placeholder' => 'Website',
                                        'class' => 'form-control',
                                        'id' => 'website'
                                    ]
                                ) !!}
                            </li>

                            <li class="list-group-item">
                                <label for="facebook">Facebook:</label>
                                {!! Form::text(
                                    'facebook',
                                    old('facebook') ? old('facebook') : $profile->facebook,
                                    [
                                        'placeholder' => 'Facebook',
                                        'class' => 'form-control',
                                        'id' => 'facebook'
                                    ]
                                ) !!}
                            </li>

                            <li class="list-group-item">
                                <label for="twitter">Twitter:</label>
                                {!! Form::text(
                                    'twitter',
                                    old('twitter') ? old('twitter') : $profile->twitter,
                                    [
                                        'placeholder' => 'Twitter',
                                        'class' => 'form-control',
                                        'id' => 'twitter'
                                    ]
                                ) !!}
                            </li>

                            <li class="list-group-item">
                                <label for="google_plus">Google+:</label>
                                {!! Form::text(
                                    'google_plus',
                                    old('google_plus') ? old('google_plus') : $profile->google_plus,
                                    [
                                        'placeholder' => 'Google+',
                                        'class' => 'form-control',
                                        'id' => 'google_plus'
                                    ]
                                ) !!}
                            </li>
                        </div>
                    </div>

                    {!! Form::submit('Edit', [ 'class' => 'btn btn-default center-block', 'id' => 'profile-edit-button' ]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Picture</strong></h3>
                </div>
                <div class="panel-body">
                    NotImplementedException();
                </div>
            </div>
        </div>
    </div>
@endsection