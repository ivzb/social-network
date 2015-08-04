<html>
<head>
    <title>Social Network - @yield('title')</title>
</head>
<body>
    <ul id="main-menu">
        <li><a href="/">Home</a></li>
        <li><a href="/auth/login">Login</a></li>
        <li><a href="/auth/register">Register</a></li>
    </ul>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>