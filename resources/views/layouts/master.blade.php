<html>
<head>
    <title>Social Network - @yield('title')</title>
</head>
<body>
    <p>Hello, <b>{{$user->username}}</b></p>

    <ul id="main-menu">
        <li><a href="/home">Home</a></li>
        <li><a href="/profile">Profile</a></li>
        <li><a href="/profile/edit">Settings</a></li>
        <li><a href="/auth/logout">Logout</a></li>
    </ul>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>