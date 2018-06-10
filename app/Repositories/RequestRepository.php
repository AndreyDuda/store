<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 10.06.2018
 * Time: 20:27
 */

namespace App\Repositories;


class RequestRepository extends Repository
{
    public  function __construct(Product $product)
    {
        $this->model = $product;
    }

}