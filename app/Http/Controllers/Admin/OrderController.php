<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;

class OrderController extends AdminController
{
    //
    public function __construct(OrderRepository $order_rep)
    {
        $this->template  = env('THEME') . '.admin.index';
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

        $content    = view(env('THEME') . '.admin.order.index')->with($data)->render();
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
                $order->update(0);
            }elseif($data == 'success'){
                $order->update(2);
            }
        }
            return false;
    }

}
