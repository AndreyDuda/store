<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 10.06.2018
 * Time: 20:27
 */

namespace App\Repositories;

use App\Order;
use Validator;


class OrderRepository extends Repository
{
    public  function __construct(Order $order_rep)
    {
        $this->model = $order_rep;
    }

    public function validator($input)
    {
        $validator = Validator::make($input, [

            'fio'       => 'required'
        ]);

        return $validator;
    }

}


