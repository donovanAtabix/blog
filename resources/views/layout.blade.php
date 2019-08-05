<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600"
    rel="stylesheet">
</head>
<body>
    <div>
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Posts</a></li>
                <li><a href="">Avatar</a></li>
            </ul>
        </nav>
    </div>
    @yield('content_header')

    @yield('body')
</body>
</html>
