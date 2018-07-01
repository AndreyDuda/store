<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends SiteController
{
    public function __construct()
    {
        $this->template = 'storejeans.index';
    }

    public function index()
    {
        $data       = [

        ];
        $content    = view(env('THEME') . '.delivery.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
}
