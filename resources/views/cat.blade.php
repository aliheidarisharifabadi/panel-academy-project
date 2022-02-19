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
            @endif
        </div>
        <div class="left">

            <p class="moshakhasat"><span>{{$user->first_name." ".$user->last_name}}</span><span>{{$user->code}}</span></p>

                       <div class="m-des">
                           {{$categories[$cat-1]->description}}
                       </div>

                        <form method="POST" action="{{ route('post.request') }}">
                            @csrf
                            <input type="hidden" id="cat" name="cat"
                                   value={{$categories[$cat-1]->id}}>
                            <input type="hidden" id="username" name="user" value={{$user->id}}>
                            <input type="hidden" id="username" name="first_name" value={{$user->first_name}}>
                            <input type="hidden" id="username" name="last_name" value={{$user->last_name}}>
                            <input type="hidden" id="usercode" name="usercode" value={{$user->code}}>
                            <p class="bt-req"><input type="submit" value="ثبت" name="submit"/></p>


                        </form>




{{--            @if (isset($_GET['submit'])) {--}}

{{--            <div class="center">--}}
{{--                <p><span>{{$user->name}}</span><span>{{$user->code}}</span></p>--}}
{{--            </div>--}}
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
{{--                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}
{{--                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo--}}
{{--                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse--}}
{{--                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non--}}
{{--                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}

{{--            @endif--}}

        </div>
    </div>
@endsection
<?php //} ?>
