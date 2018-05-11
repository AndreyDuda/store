<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ProductRepository;

class IndexController extends SiteController
{
    //
    public function __construct(ProductRepository $product_rep)
    {
        $this->product_rep = $product_rep;

        $this->template = env('THEME') . '.index';
    }

    public function index()
    {
        $products = $this->product_rep->getAll();
       /* $content = view(env('THEME') . '.content')->with('products', $products)->render();*/
        $content = view(env('THEME') . '.content')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function contact()
    {

    }

    public function delivery()
    {

    }
}
