<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 10.06.2018
 * Time: 20:27
 */

namespace App\Repositories;

use App\RequestProduct;
use Validator;


class RequestProductRepository extends Repository
{
    public  function __construct(RequestProduct $request_product)
    {
        $this->model = $request_product;
    }

    public function validator($input)
    {
        $validator = Validator::make($input, [

            'fio'       => 'required'
        ]);

        return $validator;
    }

}


