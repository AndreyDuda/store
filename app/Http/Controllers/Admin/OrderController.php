<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Session;

class OrderController extends AdminController
{
    //
    public function __construct(OrderRepository $order_rep)
    {
        $this->template  = 'storejeans' . '.admin.index';
        $this->order_rep = $order_rep;
    }

    public function index()
    {
        $step     = 3;
        $paginate = 125;
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
    }

    public function show(Request $request)
    {
        $id   = $request->id;
        $order  = $this->order_rep->getOne($id);
        $products =   json_decode($order->product);


//dd($products);
        $data = [
            'order' => $order,
            'products' => $products
        ];


        $content    = view('storejeans' . '.admin.order.show')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();


    }

}
