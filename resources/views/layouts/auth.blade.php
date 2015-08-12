<!DOCTYPE html>
<html lang="en">
<head>
    <title>Linear - @yield('title')</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="/css/auth.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js" defer></script>
    <!--<script src="/js/auth.js" defer></script>-->
</head>
<body>
    <div class="wrapper">
        <div id="auth-menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/auth/login">Login</a></li>
                <li><a href="/auth/register">Register</a></li>
            </ul>
        </div>

        <div class="container">
            @yield('content')
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>
</html>