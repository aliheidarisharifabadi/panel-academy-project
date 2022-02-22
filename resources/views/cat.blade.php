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
        <div class="left" id="test">

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
                            <p class="bt-req"><input type="submit" id="cmd" onclick="javascript:window.print()" value="ثبت" name="submit"/></p>
                            @if(session()->has('message'))
                                <div class="message" style="color:green;font-size:14px;margin-top:10px;font-width:bold;">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                        </form>

        </div>
    </div>


@endsection
<?php //} ?>
