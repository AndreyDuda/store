<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class CartController extends SiteController
{


    public function __construct(ProductRepository $product_rep)
    {
        $this->template = env('THEME') . '.index';
        $this->product_rep = $product_rep;
    }

    public function index()
    {
        $data       = [

        ];
        $content    = view(env('THEME') . '.cart.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function by(Request $request)
    {
        $id = $request->id;
        $product = $product  = $this->product_rep->getOne($id);


        if(Session::has('cart'))
        {


        }else{

        }


        return $request->id;


        /*echo 'adasd';*/

    }
}
