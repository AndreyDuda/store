<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\OrderRepository;
use App\Repositories\SettingRepository;




/*use App\Mail;*/
use App\Mail\OrderShipped;


use Illuminate\Support\Facades\Mail;
use Session;

class CartController extends SiteController
{

    public function __construct(ProductRepository $product_rep, OrderRepository $order_rep, SettingRepository $setting_rep)
    {
        $this->template = 'storejeans.index';
        $this->product_rep = $product_rep;
        $this->order_rep = $order_rep;
        $this->setting_rep = $setting_rep;

    }

    public function index()
    {

        $products = Session::get('cart', false);
        $dir      = 'storejeans'.'/img/catalog';
        $images   = scandir($dir);
        $data       = [
            'products' => $products,
            'images'   => $images
        ];
        $content    = view(env('THEME') . '.cart.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $metaKey = $this->setting_rep->getOne('MetaKeySite');
        $metaDesc = $this->setting_rep->getOne('MetaDescSite');

        $telephoneMTC = $this->setting_rep->getOne('telephoneMTC');
        $telephoneKiev = $this->setting_rep->getOne('telephoneKiev');
        $metatitle = $this->setting_rep->getOne('title');

        $this->vars = array_add($this->vars, 'telephoneMTC', $telephoneMTC);
        $this->vars = array_add($this->vars, 'telephoneKiev', $telephoneKiev);
        $this->vars = array_add($this->vars, 'metaKey', $metaKey);
        $this->vars = array_add($this->vars, 'metaDesc', $metaDesc);
        $this->vars = array_add($this->vars, 'title', $metatitle);

        return $this->renderOutput();
    }

    public function delProd(Request $request)
    {
        $id = $request->id;
        $product = $product = $this->product_rep->getOne($id);
        $cart = [];

        if (Session::has('cart')) {
            $cart = Session::get('cart', false);
            if ($cart) {
                if (array_key_exists($product->id, $cart)) {
                    unset($cart[$product->id]);
                }
                Session::put('cart', $cart);
            }

        }
        return Session::get('cart', false);
    }

    public function by(Request $request)
    {
        $id = $request->id;
        $product = $product = $this->product_rep->getOne($id);
        $cart = [];

        if (Session::has('cart') && count(Session::get('cart'))) {
            $cart = Session::get('cart', false);
            if ($cart) {

                if (array_key_exists($product->id, $cart)) {
                    if ($request->minus) {
                        $cart[$product->id]['count'] -= 1;
                    } else {
                        $cart[$product->id]['count'] += 1;
                    }
                } else {
                    $photo_cart = 'system/no-image';
                    $dir = 'storejeans' . '/img/catalog';
                    $images = scandir($dir);
                    if (in_array(str_replace('catalog/', '', $product->photo_maine . '.jpg'), $images)) {
                        $photo_cart = $product->photo_maine;
                    }
                    $cart[$product->id] = [
                        'id' => $product->id,
                        'code' => $product->code,
                        'photo' => $photo_cart,
                        'lable' => $product->label,
                        'title' => $product->title,
                        'price' => $product->price_many,
                        'count' => 1,
                        'url' => route('cartBy'),
                        'count_in_pack' => $product->count_in_pack
                    ];

                }
                Session::put('cart', $cart);
            }

        } else {
            $photo_cart = 'system/no-image';
            $dir = 'storejeans' . '/img/catalog';
            $images = scandir($dir);
            if (in_array(str_replace('catalog/', '', $product->photo_maine . '.jpg'), $images)) {
                $photo_cart = $product->photo_maine;
            }
            $cart[$product->id] = [
                'id' => $product->id,
                'code' => $product->code,
                'photo' => $photo_cart,
                'lable' => $product->label,
                'title' => $product->title,
                'price' => $product->price_many,
                'count' => 1,
                'url' => route('cartBy')
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
        $message = 'Заказ успешно отправлен';

        unset($input['_token']);
        $input['new'] = 1;
        $cart = Session::get('cart', false);
        if($cart) {
            foreach ($cart as $item) {
                $i++;
                $product[$i]['code'] = $item['code'];
                $product[$i]['count'] = $item['count'];
            }
            $input['product'] = json_encode(Session::get('cart', false));

            $this->order_rep->add($input);


            $name = ($input['fio']) ? $input['fio'] : 'Клиент';
            $user = ($input['email']) ? $input['email'] : false;
            $tel = $input['telephone'];
            $email = 'credonull@gmail.com';

            $telephoneMTC = $this->setting_rep->getOne('telephoneMTC');
            $telephoneKiev = $this->setting_rep->getOne('telephoneKiev');
            $this->vars = array_add($this->vars, 'telephoneMTC',  $telephoneMTC);
            $this->vars = array_add($this->vars, 'telephoneKiev', $telephoneKiev);
            if ($user) {
                Mail::to($user)->send(new OrderShipped($name, $telephoneKiev, $email, $user, false));
            }
            Mail::to('credonull@gmail.com')->send(new OrderShipped($name, $tel, $email, $user, Session::get('cart', false)));

            /* dd($this->order_rep);*/
            /*return redirect()->route('cart')->with('Ваш заказ отправлен в обрабатываетку');*/
            $request->session()->forget('cart');
        }
        $message = 'Заказ не обработан';
        return redirect()->route('cart')->with('status', $message);
    }

}
