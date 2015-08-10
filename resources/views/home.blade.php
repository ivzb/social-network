@extends('layouts.master')

@section('title', 'Home')

@section('content')
    @include('layouts.logged-navigation', ['current_page' => 'home'])

    <p>This is the home page.</p>
@endsection