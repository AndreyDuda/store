<?php

namespace App\Http\Controllers;

use Config;
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
        $step = Config::get( 'settings.paginateStep' );
        $data = [
            'products' => $products,
            'step'     => $step
        ];
        $content = view(env('THEME') . '.product.products')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $product = $this->product_rep->getOne($id);
        $products = $this->product_rep->getLabel($product->label);
        $data = [
            'product'  => $product,
            'products' => $products
        ];
        $content = view(env('THEME') . '.product.product')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

}
