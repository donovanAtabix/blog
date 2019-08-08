<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600"
    rel="stylesheet">

    <style>
        .topnav{
            overflow: hidden;
        }

        .topnav li {
            float: left;
            color: #636b6f;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a{
            color: #636b6f;
        }

        div.box {
            background-color: white;
            width: 200px;
            padding: 25px;
            border: 3px #636b6f;
        }

    </style>

</head>
<body>
    <div>
        <nav>
            <ul class="topnav">
                <li class="topnav"><a href="">Home</a></li>
                <li class="topnav"><a href="/blogposts/index">Posts</a></li>
                <li class="topnav"><a href="">Avatar</a></li>
            </ul>
        </nav>
    </div>
    @yield('content_header')

    @yield('body')
</body>
</html>
