<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="{{ $metaKey OR '' }}">
    <meta name="description" content="{{ $metaDesc OR '' }}">
    <title>{{ $title OR ''}}</title>
    <link rel="icon" href="{{  asset('storejeans') }}/img/favicon.ico">
    <link rel="stylesheet" href="{{  asset('storejeans') }}/libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{  asset(env('THEME')) }}/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{  asset(env('THEME')) }}/libs/slick/css/slick.css">
    <link rel="stylesheet" href="{{  asset(env('THEME')) }}/css/fonts.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Basic" rel="stylesheet">
    <link rel="stylesheet" href="{{  asset(env('THEME')) }}/css/main.css">
    <link rel="stylesheet" href="{{  asset(env('THEME')) }}/css/media.css">
</head>
<body>
<header>
    <div class="header-desktop" >
        <div class="logo">

            <a href="{{ route('index') }}">
                <img src="{{  asset(env('THEME')) }}/img/logo.png" alt="" >
            </a>

        </div>
        <div class="menu-left">
           {{-- <a href="{{ route('index') }}">На сайт</a>--}}


        </div>
        {{--<div class="input-wrapper search" data-text="">
            <input type="text" placeholder="Поиск  по сайту…">
        </div>--}}
        <!-- <div class="menu-right"> -->

        <div class="contacts-wrap">
            <div class="phones phones-header">
                <p class="icon mtc"> 099 378 33 31</p>
                <p class="icon kievstar"> 096 002 65 69</p>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="menu-up">
            <a href="index.php" class="logo-mobile">
                <img src="{{  asset(env('THEME')) }}/img/1_whitemini_logo.png" alt="">
            </a>
            <a href="tel:0993783331" class="phone ">
                099 378 33 31
            </a>
            <a href="cart.php" class="cart">
                <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                <span id="count-cart">0</span>
            </a>
            <div class="burger">
                <input type="checkbox" id="burger_check" class="burger_checkbox">
                <label for="burger_check">
                    <i class="fa fa-bars"></i>
                </label>
            </div>
        </div>
        <div class="menu-left-mobile">
            <a href="{{ route('index') }}">На сайт</a>
            <a href="{{route('OrderIndex')}}">Заказы</a>
        </div>
    </div>
</header>
<div class="flex main-block">
<aside class="aside-2">
    <dl class=" filters-admin">
        <dt class="filter-header">
            Товары
        </dt>
        <dd class="filter-body ">
            <ul>
                <li>
                    <a href="{{ route('adminProduct') }}">Все товары</a>
                </li>
                <li>
                    <a href="{{ route('newProduct') }}">Добавить товар</a>
                </li>
                <li>
                    <a href="{{ route('uploadFileForm') }}">Добавить товары Excel</a>
                </li>
            </ul>
        </dd>
        <dt class="filter-header">
            Заказы
        </dt>
        <dd class="filter-body ">
            <ul>
                <li>
                    <a href="{{ route('OrderIndex') }}">Все</a>
                </li>
                <li>
                    <a href="{{ route('OrderNew') }}">Новые</a>
                </li>
                <li>
                    <a href="{{ route('OrderSuccess') }}">Обработанные</a>
                </li>
                <li>
                    <a href="{{ route('OrderErr') }}">Отмененные</a>
                </li>

            </ul>
        </dd>
        <dt class="filter-header">
            Настройки сайта
        </dt>
        <dd class="filter-body ">
            <ul>
                <li>
                    <a href="{{ route('indexImage') }}">Все картинки</a>
                </li>
                <li>
                    <a href="{{ route('unusedImage') }}">Неиспользуемые</a>
                </li>
                <li>
                    <a href="{{ route('uploadImage') }}">Добавить картинки</a>
                </li>
                <li>
                    <a href="{{ route('settingsSite') }}">Настройки сайта</a>
                </li>
                <li>
                    <a href="{{ route('user') }}">Пользователи</a>
                </li>
                <li>
                    <a href="{{ route('addUser') }}">Добавить пользователя</a>
                </li>
               {{-- <li><a href="{{ route('register') }}">Register</a></li>--}}
            </ul>
        </dd>
        <dt class="filter-header">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Выйти
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </dt>

    </dl>
</aside>

@yield('content')



</div>












<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script><!-- JQuery -->
<script src="{{  asset(env('THEME')) }}/js/admin.js"></script><!-- My JS file -->