<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends SiteController
{
    public function __construct(ProductRepository $product_rep)
    {
        $this->product_rep = $product_rep;

        $this->template = env('THEME') . '.index';
    }

    public function index()
    {
        $products = $this->product_rep->getAll();
        $content = view(env('THEME') . '.product.products')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function product()
    {
        $products = $this->product_rep->getOne('1');
        $content = view(env('THEME') . '.product.product')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

}
