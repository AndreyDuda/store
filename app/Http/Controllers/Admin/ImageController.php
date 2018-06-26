<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends AdminController
{
    public function __construct()
    {
        $this->template    = env('THEME') . '.admin.index';
    }

    public function uploadImage(Request $request)
    {
        if($request->isMethod('post')){
            dd($request->file('image'));
        }
        $data = [

        ];
        $content    = view(env('THEME') . '.admin.image.upload')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
}
