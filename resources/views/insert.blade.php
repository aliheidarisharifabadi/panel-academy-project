<?php
//session_start();
//if(!isset($_SESSION['user_name'])){
//    echo "<script>window.open('/admin/login.php?not_authorize=شما دسترسی ندارید','_self')</script>";
//}else{
?>
<?php
$categories = \App\Models\Category::all();
?>
@extends('layout')
@section('content')

    <div class="wrapper">
        <div class="right">
{{--            <h3 class="cat_req" style="padding: 5px;">داشبورد</h3>--}}
            @foreach($categories as $category)
                <a class="cat_req" href="/dashboard/req/cat_{{$category->id}}"> {{$category->title}}</a>

            @endforeach
            @if($user->role === 'admin')
                <a class="cat_req" href="/dashboard/allrequest"> تمام درخواست ها</a>
                <a class="cat_req" href="/dashboard/insert_user"> افزودن کاربر</a>
            @endif
        </div>
        <div class="left">

            <p class="moshakhasat"><span>{{$user->name}}</span><span>{{$user->code}}</span></p>
<div style="text-align:center;margin-top: 10px;">
            <form method="POST" action="{{ route('post.register') }}">
                @csrf
               <p class="sabt-user"> <input type="text" name="name" placeholder="نام و نام خانوادگی" required></p>
                <p class="sabt-user"> <input type="text" name="father" placeholder="نام پدر" required></p>
                <p class="sabt-user"> <input type="text" name="username" placeholder="کد ملی" required></p>
                <p class="sabt-user"> <input type="text" name="code" placeholder="کد پرسنلی" required></p>
                <p class="sabt-user"> <input type="text" name="shenasname" placeholder="شماره شناسنامه" required></p>
                <p class="sabt-user"> <input type="text" name="birth_day" placeholder="تاریخ تولد" required></p>
                <p class="sabt-user"> <input type="text" name="mobile" placeholder="موبایل" required></p>
                <p class="sabt-user"> <input type="password" name="password" placeholder="رمز عبور" required></p>
                <p class="bt-req"><input type="submit" id="cmd"  value="ثبت" name="submit"/></p>
                @if(session()->has('message'))
                    <div class="message" style="color:green;font-size:14px;margin-top:10px;font-width:bold;">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </form>
</div>

        </div>
    </div>
@endsection
<?php //} ?>
