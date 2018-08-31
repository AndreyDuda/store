<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 10.04.2018
 * Time: 19:07
 */

namespace App\Repositories;

use App\Product;
use Validator;

class ProductRepository extends Repository
{
    public  function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getOneСode($code){
        $result = $this->model->where('code', $code)->first();

        return $result;
    }
}