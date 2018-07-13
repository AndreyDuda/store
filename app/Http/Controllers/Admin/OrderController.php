<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Repositories\SettingRepository;
use App\Http\Controllers\Controller;
use Config;
use Session;

class OrderController extends AdminController
{
    //
    public function __construct(OrderRepository $order_rep, SettingRepository $setting_rep)
    {
        $this->template    = 'storejeans' . '.admin.index';
        $this->order_rep   = $order_rep;
        $this->setting_rep = $setting_rep;
    }

    public function index()
    {
        $step     = $this->setting_rep->getOne('PaginateCatalog');
        $paginate = $this->setting_rep->getOne('CountOrder');
        $select   = '*';
        $where    = false;
        $order    = false;
        $order    = $this->order_rep->getAll($select, $paginate, $where, $order);
        $data = [
            'order' => $order
        ];

        $content    = view('storejeans' . '.admin.order.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function successOrder(Request $request)
    {
        if($request->isMethod('post'))
        {
            $id   = $request->id;
            $data = $request->data;
            if($id && $data){
                $order  = $this->order_rep->getOne($id);
                if($data == 'delete'){
                    $order->new = 0;
                    $order->save();
                }elseif($data == 'success'){
                    $order->new = 2;
                    $order->save();
                }
            }
            return 'success';

        }else{
            $step     = $this->setting_rep->getOne('PaginateCatalog');
            $paginate = 2;
            $select   = '*';
            $where    = 'new = 2';
            $order    = false;
            $order    = $this->order_rep->getAll($select, $paginate, $where, $order);
            $data = [
                'order' => $order
            ];

            $content    = view('storejeans' . '.admin.order.index')->with($data)->render();
            $this->vars = array_add($this->vars, 'content', $content);
            $metatitle = $this->setting_rep->getOne('title');
            $this->vars = array_add($this->vars, 'title', $metatitle);
            return $this->renderOutput();
        }

    }

    public function errOrder()
    {
        $step     = $this->setting_rep->getOne('PaginateCatalog');
        $paginate = 1;
        $select   = '*';
        $where    = 'new = 0';
        $order    = false;
        $order    = $this->order_rep->getAll($select, $paginate, $where, $order);
        $data = [
            'order' => $order
        ];

        $content    = view('storejeans' . '.admin.order.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        $metatitle = $this->setting_rep->getOne('title');
        $this->vars = array_add($this->vars, 'title', $metatitle);
        return $this->renderOutput();
    }

    public function newOrder()
    {
        $step     = $this->setting_rep->getOne('PaginateCatalog');
        $paginate = 1;
        $select   = '*';
        $where    = 'new = 1';
        $order    = false;
        $order    = $this->order_rep->getAll($select, $paginate, $where, $order);
        $data = [
            'order' => $order
        ];

        $content    = view('storejeans' . '.admin.order.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        $metatitle = $this->setting_rep->getOne('title');
        $this->vars = array_add($this->vars, 'title', $metatitle);
        return $this->renderOutput();

    }

    public function show(Request $request)
    {
        $id       = $request->id;
        $order    = $this->order_rep->getOne($id);
        $products =   json_decode($order->product);

       /* dd($products);*/
        $dir        = 'storejeans'.'/img/catalog';
        $images     = scandir($dir);
        $data = [
            'order' => $order,
            'products' => $products,
            'images'   => $images
        ];


        $content    = view('storejeans' . '.admin.order.show')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        $metatitle = $this->setting_rep->getOne('title');
        $this->vars = array_add($this->vars, 'title', $metatitle);
        return $this->renderOutput();

    }

}
