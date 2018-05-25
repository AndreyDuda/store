<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends SiteController
{
    public function __construct(ProductRepository $product_rep)
    {
        $this->template = env('THEME') . '.index';
        $this->product_rep = $product_rep;
    }

    public function index()
    {
        $select   = ['product_id', 'title', 'price_many', 'photo', 'label', 'desc'];
        $paginate = Config::get( 'settings.paginate' );
        $products = $this->product_rep->getAll($select, $paginate);
        $step     = Config::get( 'settings.paginateStep' );
        $data     = [
            'products' => $products,
            'step'     => $step
        ];

        $content    = view(env('THEME') . '.product.products')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function show(Request $request)
    {
        $id       = $request->id;
        $product  = $this->product_rep->getOne($id);
        $products = $this->product_rep->getLabel($product->label);
        $data     = [
            'product'  => $product,
            'products' => $products
        ];
        $content    = view(env('THEME') . '.product.product')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

}
