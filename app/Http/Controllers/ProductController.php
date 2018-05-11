<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return 'Все товары + параметры фильтров';
    }

    public function product()
    {
        return 'Один товар с описанием';
    }

}
