<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;


class ProductController extends AdminController
{
    public function __construct(ProductRepository $product_rep)
    {
        $this->template = env('THEME') . '.admin.index';
        $this->product_rep = $product_rep;
    }

    public function index()
    {
        $data = [

        ];

        $content    = view(env('THEME') . '.admin.product.content')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
}
