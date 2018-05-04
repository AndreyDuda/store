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

    public function getCategories()
    {

    }

    public function getCountry()
    {

    }

    public function getFemale()
    {

    }
    public function getLable()
    {

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