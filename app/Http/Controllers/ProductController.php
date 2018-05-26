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

    public function index(Request $request)
    {
        $step     = Config::get( 'settings.paginateStep' );
        $paginate = Config::get( 'settings.paginate' );
        $select   = ['product_id', 'title', 'price_many', 'photo', 'label', 'desc'];
        $where    = false;

       //dd($request->input());

        $lable    = $this->product_rep->uniqueValue('label');
        $country  = $this->product_rep->uniqueValue('country');
        $style    = $this->product_rep->uniqueValue('style');
        $size     = $this->product_rep->uniqueValue('size');
        $sesons   = $this->product_rep->uniqueValue('sesons');

        if($request->isMethod('post')){

            if(true){
                $input = $request->except('_token');
                foreach ($input as $k=>$item){
                    echo $k . '<br />';
                    foreach ($item as $i){
                        echo $i . '<br />';
                    }
                }
            }



            dd();
        }else{
            $products = $this->product_rep->getAll($select, $paginate);
        }

        $data     = [
            'products' => $products,
            'step'     => $step,
            'lable'    => $lable,
            'country'  => $country,
            'style'    => $style,
            'size'     => $size,
            'sesons'   => $sesons
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
