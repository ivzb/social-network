@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    @include('layouts.logged-navigation', ['current_page' => 'profile'])

    <div class="page-header">
        <h2>{{ $profile->user->username }}'s profile</h2>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>About</strong></div>
                <div class="panel-body">
                    <ul class="list-group profile-data">
                        @unless (!$profile->first_name)
                            <li class="list-group-item">First name: <strong>{{ $profile->first_name }}</strong></li>
                        @endunless

                        @unless (!$profile->last_name)
                            <li class="list-group-item">Last name: <strong>{{ $profile->last_name }}</strong></li>
                        @endunless

                        @unless (!$profile->birth_date)
                            <li class="list-group-item">Born: <strong>{{ date('d F Y', strtotime($profile->birth_date)) }}</strong></li>
                        @endunless

                        @unless (!$profile->gender)
                            <li class="list-group-item">Gender: <strong>{{ $profile->gender }}</strong></li>
                        @endunless

                        @unless (!$profile->location)
                            <li class="list-group-item">Location: <strong>{{ $profile->location }}</strong></li>
                        @endunless

                        @unless (!$profile->about_me)
                            <li class="list-group-item">About: <strong>{{ $profile->about_me }}</strong></li>
                        @endunless

                        <li class="list-group-item">
                            <span>Social:</span>
                            @unless (!$profile->facebook)
                                <a href="{{ $profile->facebook }}"><img src="/images/facebook.png" class="profile-facebook-icon" /></a>
                            @endunless
                            @unless (!$profile->twitter)
                                <a href="{{ $profile->twitter }}"><img src="/images/twitter.png" class="profile-twitter-icon" /></a>
                            @endunless
                            @unless (!$profile->google_plus)
                                <a href="{{ $profile->google_plus }}"><img src="/images/google_plus.png" class="profile-google-plus-icon" /></a>
                            @endunless
                            @unless (!$profile->website)
                                <a href="{{ $profile->website }}"><img src="/images/website.png" class="profile-website-icon" /></a>
                            @endunless
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Friends (NaN)</strong></div>
                <div class="panel-body">
                    NotImplementedException();
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Wall</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        {!! Form::open(array('action' => 'PostController@store')) !!}
                        <div class="panel-body">
                            {!! Form::textarea('post_content', null, ['placeholder' => 'What\'s on your mind?', 'class' => 'form-control', 'rows' => 3]) !!}
                            {!! Form::hidden('recipient_user_id', $profile->user->id) !!}
                        </div>
                        <div class="panel-footer">
                            {!! Form::submit('Post', ['class' => 'btn btn-default']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                    @foreach ($posts as $post)
                        <hr />
                        @include('../post.post_content', [ 'post' => $post, 'comments_count' => 'limited' ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection