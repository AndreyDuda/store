<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="Keywords" content="{{ $metaKey OR '' }}">
    <meta name="description" content="{{ $metaDesc OR '' }}">

    <title>{{ $metaTitle OR ''}}</title>
    <link rel="icon" href="{{  asset('storejeans') }}/img/favicon.ico">
    <link rel="stylesheet" href="{{  asset('storejeans') }}/libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{  asset('storejeans') }}/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{  asset('storejeans') }}/libs/slick/css/slick.css">
    <link rel="stylesheet" href="{{  asset('storejeans') }}/css/fonts.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Basic" rel="stylesheet">
    <link rel="stylesheet" href="{{  asset('storejeans') }}/css/main.css">
    <link rel="stylesheet" href="{{  asset('storejeans') }}/css/media.css">
</head>
<body>
<header>

    <div class="header-desktop" >
        <div class="logo">

            <a href="{{ route('index') }}">
                <img src="{{  asset('storejeans') }}/img/logo.png" alt="" >
            </a>
        </div>
        <div class="menu-left">
            <a href="{{ route('contacts') }}">Контакты</a>
            <a href="{{ route('delivery') }}">Доставка и Оплата</a>
            <a href="{{ route('productAll') }}">Каталог</a>
        </div>
        {{--<div class="input-wrapper search" data-text="">--}}
            {{--<input type="text" placeholder="Поиск  по сайту…">--}}
        {{--</div>--}}
        <div class="search">
            <input type="text" placeholder="Поиск....">
            <ul>
                <li class="flex">
                    <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet. sit amet.</p>
                </li>
                <li class="flex">
                    <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet. sit amet.</p>
                </li><li class="flex">
                    <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet. sit amet.</p>
                </li><li class="flex">
                    <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet. sit amet.</p>
                </li><li class="flex">
                    <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet. sit amet.</p>
                </li><li class="flex">
                    <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet. sit amet.</p>
                </li><li class="flex">
                    <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet. sit amet.</p>
                </li><li class="flex">
                    <img src="{{ asset('storejeans')}}/img/system/no-image.png" alt="">
                    <p>Lorem ipsum dolor sit amet. sit amet.</p>
                </li>
            </ul>
        </div>
        <!-- <div class="menu-right"> -->

        <a href="{{ route('cart') }}" class="cart">
            <i class="fa fa-shopping-cart " aria-hidden="true"></i>
            <span id="count-cart">{{ (Session::has('cart'))? count(Session::get('cart')):0}}</span>
        </a>
        <div class="contacts-wrap">
            <div class="phones phones-header">
                <p class="icon mtc"> 099 378 33 31</p>
                <p class="icon kievstar"> 096 002 65 69</p>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="menu-up">
            <a href="{{ route('index') }}" class="logo-mobile">
                <img src="{{  asset('storejeans') }}/img/1_whitemini_logo.png" alt="">
            </a>
            <a href="tel:0993783331" class="phone ">
                099 378 33 31
            </a>
            <a href="{{ route('cart') }}" class="cart">
                <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                <span>5</span>
            </a>
            <div class="burger">
                <input type="checkbox" id="burger_check" class="burger_checkbox">
                <label for="burger_check">
                    <i class="fa fa-bars"></i>
                </label>
            </div>
        </div>
        <div class="menu-left-mobile">
            <a href="{{ route('productAll') }}">Каталог</a>
            <a href="{{ route('delivery') }}">Доставка и Оплата</a>
            <a href="{{ route('contacts') }}">Контакты</a>
        </div>
    </div>
</header>
<main>
    {{ csrf_field() }}


<?php
/*include('parts/header.php');
*/?>


@yield('content')

<?php
/*include('parts/footer.php');
*/?>

</main>
<footer>
    <div class="position">
        <div class="scrollTop" id="up">
            <a href="#top" title="ВВЕРХ">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="footer-info">
        <ul>
            <li>
                <a href="catalog.php">Каталог</a>
            </li>
            <li>
                <a href="delivery.php">
                    Доставка и оплата
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-contact">
        <ul>
            <li class="footer-number">099 378 33 31</li>
            <li class="footer-number">096 002 65 69</li>
            <li>
                <a target="_blank" href="https://www.google.com.ua/maps/place/%D1%83%D0%BB.+%D0%91%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D1%8F,+%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%B0,+%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+65000/@46.4392703,30.6441511,17z/data=!3m1!4b1!4m5!3m4!1s0x40c63285454006fd:0xf31e7adb8b55c193!8m2!3d46.4392666!4d30.6463398">
                    <p>Магазин-склад "380" за ул. Розовой</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-time">
        <h3>7:00 - 16:00</h3>
        <ul>
            <li>Пн</li>
            <li>Вт</li>
            <li>Ср</li>
            <li>Чт</li>
            <li>Сб</li>
            <li>Вс</li>
        </ul>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script><!-- JQuery -->
<script src="{{  asset('storejeans') }}/libs/zoom/js/jquery.zoom.min.js"></script><!-- Zoom -->
<script src="{{  asset('storejeans') }}/libs/slick/js/slick.min.js"></script><!-- Slick -->
<script src="{{  asset('storejeans') }}/js/common.js"></script><!-- My JS file -->

<!-- <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script> -->
<!-- LiveReload -->
</body>
</html>
