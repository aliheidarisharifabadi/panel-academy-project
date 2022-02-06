<?php
//session_start();
//if(!isset($_SESSION['user_name'])){
//    echo "<script>window.open('/admin/login.php?not_authorize=شما دسترسی ندارید','_self')</script>";
//}else{
?>
    <!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> پیشخوان </title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }} " />
</head>

<body>
<?php
$categories = \App\Models\Category::all();
?>
<div class="wrapper">
    <div class="header"></div>
    <div class="right">
        <h3 style="padding: 5px;">panel</h3>
@foreach($categories as $category)
    <a href="?cat_{{$category->id}}"> {{$category->title}}</a>

@endforeach
    </div>
    <div class="left">
        <h2 style="color:#c33;"><?php echo @$_GET['logged'];?></h2>
        <span style="font-size:18px;">خوش آمدید</span><h2 style="color:#03c;"><?php // echo $_SESSION['user_name'];
            ?></h2>

        @if(isset($_GET['cat_1']))
          {{34}}
        @endif
        <?php
        if(isset($_GET['view_posts'])){
          //  require_once('../includes/view_posts_post.php');
        }
        if(isset($_GET['edit_posts'])){
           // require_once('../includes/edit_post.php');
        }
        if(isset($_GET['insert_cat'])){
          //  require_once('../includes/insert_cat.php');
        }
        if(isset($_GET['view_cats'])){
          //  require_once('../includes/view_cats.php');
        }
        if(isset($_GET['edit_cat'])){
          //  require_once('../includes/edit_cat.php');
        }
        ?>
    </div>
</div>
</body>
</html>
<?php //} ?>
