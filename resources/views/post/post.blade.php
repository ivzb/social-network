@extends('layouts.master')
@section('content')
    @include('post.post_content', [ 'post' => $post ])
@endsection