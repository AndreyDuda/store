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

    public function getCategory()
    {

    }

    public function getCountry()
    {

    }

    public function getFemale()
    {

    }
    public function getLabel($label)
    {
        $result = $this->model->where('label', $label)->limit(10);
        return $result->get();
    }

    public function getStyle()
    {

    }

    public function getSale()
    {

    }

    public function getNew()
    {

    }


}