<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends SiteController
{
    public function __construct()
    {
        $this->template = env('THEME') . '.index';
    }

    public function index()
    {
        $data       = [

        ];
        $content    = view(env('THEME') . '.contact.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
}