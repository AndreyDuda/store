<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Session;

class CartController extends SiteController
{


    public function __construct(ProductRepository $product_rep)
    {
        $this->template = env('THEME') . '.index';
        $this->product_rep = $product_rep;
    }

    public function index()
    {
        $cart = Session::get('cart', false);


        $data = [
            'products' => $cart
        ];
        $content = view(env('THEME') . '.cart.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function by(Request $request)
    {
        $id = $request->id;
        $product = $product = $this->product_rep->getOne($id);
        $cart = [];


        if (Session::has('cart')) {
            $cart = Session::get('cart', false);
            if ($cart) {
                if (array_key_exists($product->product_id, $cart)) {
                    $cart[$product->product_id]['count'] += 1;
                } else {
                    $cart[$product->product_id] = [
                        'photo' => $product->photo,
                        'lable' => $product->label,
                        'title' => $product->title,
                        'price' => $product->price_many,
                        'count' => 1
                    ];

                }
                Session::put('cart', $cart);
            } else {
                $cart[$product->product_id] = [
                    'photo' => $product->photo,
                    'lable' => $product->label,
                    'title' => $product->title,
                    'price' => $product->price_many,
                    'count' => 1
                ];
                Session::put('cart', $cart);
            }
            return Session::get('cart', false);
        }

    }

    public function sendRequest(Request $request)
    {

    }
}
