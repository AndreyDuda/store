<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Request as Request_rep;

use Session;

class CartController extends SiteController
{


    public $request_rep = false;

    public function __construct(ProductRepository $product_rep, Request_rep $request_rep)
    {
        $this->template = env('THEME') . '.index';
        $this->product_rep = $product_rep;
        $this->request_rep = $request_rep;

    }

    public function index()
    {
        $products = Session::get('cart', false);
        $data       = [
            'products' => $products
        ];
        $content    = view(env('THEME') . '.cart.index')->with($data)->render();
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
                        'code'  => $product->code,
                        'photo' => $product->photo,
                        'lable' => $product->label,
                        'title' => $product->title,
                        'price' => $product->price_many,
                        'count' => 1
                    ];

                }
                Session::put('cart', $cart);
            }

            } else {
                $cart[$product->product_id] = [
                    'code'  => $product->code,
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

    public function sendRequest(Request $request)
    {
        $product = array();
        $i = 0;
        $input = $request->input();
        unset($input['_token']);
        $input['new'] = 1;
        $cart = Session::get('cart', false);
        foreach ($cart as $item){
            $i++;
            $product[$i]['code']  = $item['code'];
            $product[$i]['count'] = $item['count'];
        }
        $input['product'] = json_encode($product);

        $this->request_rep->add($input);
        dd($input);
        /*return redirect()->route('cart')->with('Ваш заказ отправлен в обрабатываетку');*/
    }

}
