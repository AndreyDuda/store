<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\OrderRepository;




/*use App\Mail;*/
use App\Mail\OrderShipped;


use Illuminate\Support\Facades\Mail;
use Session;

class CartController extends SiteController
{

    public function __construct(ProductRepository $product_rep, OrderRepository $order_rep)
    {
        $this->template = 'storejeans.index';
        $this->product_rep = $product_rep;
        $this->order_rep = $order_rep;

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

                if (array_key_exists($product->id, $cart)) {
                    if($request->minus)
                    {
                        $cart[$product->id]['count'] -= 1;
                    }else{
                        $cart[$product->id]['count'] += 1;
                    }
                } else {
                    $photo_cart = 'system/no-image';
                    if(@fopen(asset('storejeans').'/img/'. $product->photo_maine.'.jpg', 'r')){
                        $photo_cart = $product->photo_maine;
                    }
                    $cart[$product->id] = [
                        'id'    => $product->id,
                        'code'  => $product->code,
                        'photo' => $photo_cart,
                        'lable' => $product->label,
                        'title' => $product->title,
                        'price' => $product->price_many,
                        'count' => 1,
                        'url'   => route('cartBy')
                    ];

                }
                Session::put('cart', $cart);
            }

            } else {
                $photo_cart = 'no-image.png';
                if(@fopen(asset('storejeans').'/img/'. $product->photo_maine.'.jpg', 'r')){
                    $photo_cart = $product->photo_maine;
                }
                $cart[$product->id] = [
                    'id'    => $product->id,
                    'code'  => $product->code,
                    'photo' => $photo_cart,
                    'lable' => $product->label,
                    'title' => $product->title,
                    'price' => $product->price_many,
                    'count' => 1,
                    'url'   => route('cartBy')
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
        $input['product'] = json_encode(Session::get('cart', false));

        $this->order_rep->add($input);


       $name = ($input['fio'])? $input['fio']:'Клиент';
       $user = ($input['email'])? $input['email']:false;
       $tel  = $input['telephone'];
       $email = 'credonull@gmail.com';

       if($user){
           Mail::to($user)->send(new OrderShipped($name, $tel, $email, $user, false));
       }
       Mail::to('credonull@gmail.com')->send(new OrderShipped($name, $tel, $email, $user, Session::get('cart', false)));

       /* dd($this->order_rep);*/
        /*return redirect()->route('cart')->with('Ваш заказ отправлен в обрабатываетку');*/
        $request->session()->forget('cart');
        return redirect()->route('cart')->with('status', 'Заказ успешно отправлен');
    }

}
