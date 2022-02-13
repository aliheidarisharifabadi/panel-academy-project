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
            <h3 style="padding: 5px;">داشبورد</h3>
            @foreach($categories as $category)
                <a href="?cat_{{$category->id}}"> {{$category->title}}</a>

            @endforeach
        </div>
        <div class="left">

            <p><span>{{$user->name}}</span><span>{{$user->code}}</span></p>

            @foreach($_GET as $key => $value)
                @if ($key != "")
                    @if (explode('_', $key)[0] == "cat")
                        {{$categories[explode('_', $key)[1]-1]->description}}

                        <form method="POST" action="{{ route('post.request') }}">

                            <input type="hidden" id="cat" name="cat"
                                   value={{$categories[explode('_', $key)[1]-1]->description}}>
                            <input type="hidden" id="username" name="username" value={{$user->name}}>
                            <input type="hidden" id="usercode" name="usercode" value={{$user->code}}>
                            <p><input type="submit" value="ثبت" name="submit"/></p>


                        </form>

                    @endif
                @endif

            @endforeach


            @if (isset($_GET['submit'])) {

            <div class="center">
                <p><span>{{$user->name}}</span><span>{{$user->code}}</span></p>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            @endif

        </div>
    </div>
@endsection
<?php //} ?>
