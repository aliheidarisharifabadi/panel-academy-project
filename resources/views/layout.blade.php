<!DOCTYPE html>
<html>
<head>
    <title>panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }} " />
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        direction:rtl;}
        table {
            text-align: center;
            width: 100%;
            margin: 20px;
        }
        th {
            width: 15%;
            padding: 10px;
        }
        tr {
            width: 15%;
            padding: 10px;
            text-align: center;
        }
        th{border-left:2px solid #333;border-bottom: 3px solid #333;}
        td{padding: 2px;border-left: 2px solid #999;}
        h2{padding: 10px;}
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .wrapper {
            width: 1300px;
            margin: auto;
            margin-top: 30px;
        }
        a.cat_req , h3.cat_req{
            padding-right: 25px!important;
        }
        p.moshakhasat {
            text-align: right;
            padding: 10px;
            padding-right: 30px;
        }
        .moshakhasat span {
            padding-left: 10px;
        }
        .m-des {
            text-align: justify;
            padding-top: 10px;
            padding-right: 25px;
        }
        .bt-req input[type="submit"] {
            border-radius: 10px;
            width: 150px;
            height: 50px;
            border: 1px solid #00000000;
            background: #c3a0ec;
            margin-top: 10px;
            margin-left: 10px;
        }
        .flex.justify-between.flex-1.sm\:hidden,p.text-sm.text-gray-700.leading-5,svg.w-5.h-5,
        span.relative.inline-flex.items-center.px-2.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.rounded-l-md.leading-5,
        a.relative.inline-flex.items-center.px-2.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-r-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150
        {
            display: none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
{{--       \\ <a class="navbar-brand" href="#">Panel</a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                   {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Register</a>
                    </li> --}}
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
