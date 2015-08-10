@extends('layouts.master')
@section('content')
    @include('layouts.logged-navigation', ['current_page' => 'post'])

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Likes</strong></div>
                <div class="panel-body">
                    NotImplementedException();
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @include('post.post_content', [ 'post' => $post ])
        </div>
    </div>
@endsection