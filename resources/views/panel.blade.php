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
                        <p>{{$categories[explode('_', $key)[1]-1]->description}}</p>
                        <button type="submit">ثبت</button>

                    @endif
                @endif
            @endforeach

            <?php
            if (isset($_GET['view_posts'])) {
                //  require_once('../includes/view_posts_post.php');
            }
            if (isset($_GET['edit_posts'])) {
                // require_once('../includes/edit_post.php');
            }
            if (isset($_GET['insert_cat'])) {
                //  require_once('../includes/insert_cat.php');
            }
            if (isset($_GET['view_cats'])) {
                //  require_once('../includes/view_cats.php');
            }
            if (isset($_GET['edit_cat'])) {
                //  require_once('../includes/edit_cat.php');
            }
            ?>
        </div>
    </div>
@endsection
<?php //} ?>
