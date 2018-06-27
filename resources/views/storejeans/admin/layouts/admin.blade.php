<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Story Jeans</title>
    <link rel="icon" href="{{  asset(env('THEME')) }}/img/favicon.ico">
    <link rel="stylesheet" href="{{  asset(env('THEME')) }}/libs/font-awesome/css/font-awesome.min.css">
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

            <a href="index.php">
                <img src="{{  asset(env('THEME')) }}/img/logo.png" alt="" >
            </a>
        </div>
        <div class="menu-left">
            <a href="index.php">На сайт</a>
            <a href="№">Регистрация</a>
            <a href="#">Заказы</a>
            <a href="#">Настройки профиля</a>
        </div>
        <div class="input-wrapper search" data-text="">
            <input type="text" placeholder="Поиск  по сайту…">
        </div>
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
                <span>0</span>
            </a>
            <div class="burger">
                <input type="checkbox" id="burger_check" class="burger_checkbox">
                <label for="burger_check">
                    <i class="fa fa-bars"></i>
                </label>
            </div>
        </div>
        <div class="menu-left-mobile">
            <a href="index.php">На сайт</a>
            <a href="№">Регистрация</a>
            <a href="#">Заказы</a>
            <a href="#">Настройки профиля</a>
        </div>
    </div>
</header>
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
                    <a href="{{ route('addProduct') }}">Добавить один товар</a>
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
                    <a href="{{ route('OrderIndex') }}">Новые</a>
                </li>
                <li>
                    <a href="{{ route('OrderIndex') }}">Обработанные</a>
                </li>
                <li>
                    <a href="{{ route('OrderIndex') }}">Все</a>
                </li>
            </ul>
        </dd>
        <dt class="filter-header">
            Настройки сайта
        </dt>
        <dd class="filter-body ">
            <ul>
                <li>
                    <a href="{{ route('indexImage') }}">Редактировать</a>
                </li>
                <li>
                    <a href="{{ route('uploadImage') }}">Добавить картинки</a>
                </li>
                <li>
                    <a href="#">Удалить картинки</a>
                </li>
            </ul>
        </dd>

    </dl>
</aside>

@yield('content')
{{--<div class="content">
    <h2 class="table-name">Table name</h2>
    <table class="admin-table">
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>

        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>

        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>

        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>

        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>

        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
        <tr>
            <td>
                id товара
            </td>
            <td>
                title
            </td>
            <td>
                decription
            </td>
            <td>
                foto
            </td>
            <td>
                another
            </td>
        </tr>
    </table>
    <a href="#">показать ещё 50 товаров >></a>
    <span class="table-text">Общее количество - 1546 товаров</span>
    <span class="table-text">Товаров на сумму - 23456789 грн. </span>
</div>--}}















<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script><!-- JQuery -->
<script src="{{  asset(env('THEME')) }}/js/admin.js"></script><!-- My JS file -->