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

        $this->template = 'storejeans.index';
    }

    public function index()
    {
        $products = $this->product_rep->getAll();
       /* $content = view('storejeans' . '.content')->with('products', $products)->render();*/
        $content = view('storejeans' . '.index.main')->render();
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
