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
            <div class="container mt-5">
            <table align="center" bgcolor="#FF9933" class="table table-bordered mb-5">
                <thead>
                <tr>
                    <td colspan="7" align="center" bgcolor="#0099CC"><h2>همه درخواست ها</h2></td>
                </tr>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد ملی</th>
                    <th>کد پرسنلی</th>
                    <th>نوع درخواست</th>
                    <th>وضعیت</th>
                </tr>
                </thead>
                <?php $req = \App\Models\Request::orderBy('id', 'desc')->paginate(10);
                foreach($req as $row){
                $user_id_req =  $row['user-id'];
                $cat_id_req = $row['category-id'];
                $user_data = \App\Models\User::find($user_id_req);
                $cat_data = \App\Models\Category::find($cat_id_req);
                $req_apro = $row['approve'];
                $req_id = $row['id'];
                ?>
                <tbody>
                <tr align="center">
                    <td>{{$user_data->first_name}}</td>
                    <td>{{$user_data->last_name}}</td>
                    <td>{{$user_data->username}}</td>
                    <td>{{$user_data->code}}</td>
                    <td>{{$cat_data->title}}</td>
                    <td>{{$req_apro}}</td>
                </tr>
                </tbody>
                <?php }?>

            </table>
            <div class="d-flex justify-content-center">
                {!! $req->links() !!}
            </div>
            </div>



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
