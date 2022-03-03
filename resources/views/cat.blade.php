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

            <p class="moshakhasat"><span>{{$user->name}}</span><span>{{$user->code}}</span></p>

            <div class="m-des">
                @if($cat == 1)
                    <p> جناب آقای احمد رضا نایب</p>
                    <p> مدیر محترم مجموعه رستوران های نایب</p>
                    <p> باسلام</p>
                    <p>احترما پیرو مذاکرات شفاهی، بدینوسیله خانم یا آقا
                        <strong>   {{$user->name}}</strong>
                        از کارکنان این دانشکده جهت استفاده از 15درصد تخفیف گروهی مطابق توافق نامه به حضورتان معرفی می
                        گردد.
                    </p>
                    <p> خواهشمند است در این خصوص همکاری لازم را مبذول فرمائید.</p>
                    <p> رستوران نایب: خ ابن سینا – مقابل پمپ بنزین</p>
                    <p> کترینگ نایب: خ دشتستان ابتدای خ حکیم شفاهی جنب بانک صادرات</p>
                    <p> کترینگ نایب: خ آل محمد روبروی مجموعه ورزشی ارغوان</p>
                @elseif($cat == 2)
                    <p> جناب آقای دکتر فتاحی</p>
                    <p> مدیر کل محترم پشتیبانی دانشگاه فنی و حرفه ای</p>
                    <p> باسلام و احترام</p>
                    <p>  بدینوسیله به استحضار می رساند آقا یا خانم
                        <strong>   {{$user->name}}</strong>
                        از کارکنان بازنشسته دانشکده فنی شهید مهاجر اصفهان به شناسه ملی
                        <strong>   {{$user->username}}</strong>
                        ، پرسنلی
                        <strong>   {{$user->code}}</strong>
                        و شماره تماس
                        <strong>   {{$user->mobile}}</strong>
                        به همراه  خانواده خود تقاضای اسکان در مهمان سرای سازمان مرکزی از .......... لغایت ..........به مدت ..... شب را دارند </p>
                    <p>   خواهشمند است دستور فرمائید  اقدامات لازم را در این خصوص را مبذول فرمایید.</p>
                @elseif($cat == 3)
                    <p>  جناب آقای کامران خلیلی</p>
                    <p>      مدیریت محترم فروشگاه پوشاک جامعه</p>
                    <p>   با سلام</p>
                    <p> احتراما به این وسیله آقا یا خانم
                        <strong>   {{$user->name}}</strong>
                        از کارکنان آموزشکده مهاجر جهت استفاده از 10 درصد تخفیف گروهی و پرداخت بصورت اقساط 8 ماهه بدون پش قسط و کارمزد مطابق تفاهم نامه تنظیمی به حضورتان معرفی می گردند .</p>
                    <p>  خواهشمند است در این خصوص همکاری لازم را مبذول فرمائید.</p>
                @elseif($cat == 4)
                    <p>  جناب آقای جواد رزمجو</p>
                    <p>  مدیر محترم عمارت تاریخی کیوان</p>
                    <p> با سلام</p>
                    <p>  احترما پیرو مذاکرات شفاهی، بدین وسیله آقا یا خانم
                        <strong>   {{$user->name}}</strong>
                        از کارکنان این دانشکده جهت استفاده از 10 درصد تخفیف گروهی مطابق توافق نامه به حضورتان معرفی می گردد.</p>
                    <p>  خواهشمند است در این خصوص همکاری لازم را مبذول فرمائید.</p>
                @endif
            </div>

            <form method="POST" action="{{ route('post.request') }}">
                @csrf
                <input type="hidden" id="cat" name="cat"
                       value={{$categories[$cat-1]->id}}>
                <input type="hidden" id="username" name="user" value={{$user->id}}>
                <input type="hidden" id="username" name="first_name" value={{$user->name}}>
                <input type="hidden" id="usercode" name="usercode" value={{$user->code}}>
                <p class="bt-req"><input type="submit" id="cmd"  value="ثبت"
                                         name="submit"/></p>
{{--                <p class="bt-req"><input type="submit" id="cmd" onclick="javascript:window.print()" value="ثبت"--}}
{{--                                         name="submit"/></p>--}}
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
