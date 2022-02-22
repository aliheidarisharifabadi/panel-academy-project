<!DOCTYPE html>
<html>
<head>
    <title>panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }} " />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>


    <style type="text/css">


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
            width: 12%;
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
        .sabt-user input[type="text"],.sabt-user input[type="password"] {
            border-radius: 10px;
            margin-top: 10px;
            height: 40px;
            padding-right: 10px;
            border: 1px solid #ffffff;
            box-shadow: 0px 1px 4px 0px #000000;
        }
        .sabt-user input[type="password"]{
            margin-bottom: 10px;
        }
        label.col-md-4.col-form-label.text-md-right {
            font-size: 16px;
            font-weight: bold;
        }
        input#National_Code {
            margin-bottom: 10px;
        }
        input#password {
            margin-bottom: 10px;
        }
        .card-header {
            font-weight: bold;
            text-align: right;
        }
        a.nav-link {
            font-weight: bold;
            font-size: 16px;
        }
        @font-face {
            /* نام فونت  */
            font-family:'iransans';
            /*نمایش فونت در مرورگر*/
            src:url('../../public/fonts/eot/IRANSansWeb.eot');
            src:local('iransans'), /* لود درصورت وجود فونت در سیستم کاربر */
            local('iransans'),
                /* فونت ها برای پشتبانی در مرورگرهای مختلف و دستگاه ها*/
            url('../../public/fonts/eot/IRANSansWeb.eot?#iefix') format('embedded-opentype'),
            url('../../public/fonts/woff/IRANSansWeb.woff') format('woff'),
            url('../../public/fonts/ttf/IRANSansWeb.ttf') format('truetype'),
            url('../../public/fonts/woff2/IRANSansWeb.woff2') format('woff2');
            /* استایل فونت ها  */
            font-style:normal;
            font-weight:normal;
        }
        *{
            font-family: 'iransans' !important;
        }
        a.nav-link {
            font-family: 'iransans';
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
                        <a class="nav-link" href="{{ route('login') }}">ورود</a>
                    </li>
                   {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Register</a>
                    </li> --}}
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">خروج</a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
