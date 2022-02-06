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
    <link rel="stylesheet" href="style.css" media="all" />
</head>

<body>
<div class="wrapper">
    <div class="header"></div>
    <div class="right">
        <h3 style="padding: 5px;">مدیریت وبلاگ</h3>
        <a href="index.php?insert_post"> درج پست جدید</a>
        <a href="index.php?view_posts"> مشاهده همه پست ها</a>
        <a href="index.php?insert_cat"> درج دسته بندی جدید</a>
        <a href="index.php?view_cats"> مشاهده همه دسته بندی ها</a>
        <a href="index.php?menu_new"> درج منو جدید</a>
        <a href="logout.php">خروج</a>

    </div>
    <div class="left">
        <h2 style="color:#c33;"><?php echo @$_GET['logged'];?></h2>
        <span style="font-size:18px;">خوش آمدید</span><h2 style="color:#03c;"><?php // echo $_SESSION['user_name'];
            ?></h2>
        <?php
        if(isset($_GET['insert_post'])){
          //  require_once('insert_post.php');
        }
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
