<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 10.04.2018
 * Time: 19:06
 */

namespace App\Repositories;
use Config;

abstract class Repository
{
    protected $model = false;

    public function getAll($pagination = true)
    {
        $builder = $this->model->select(['product_id', 'title', 'price_many', 'photo', 'label', 'desc']);

        if($pagination){
            return $this->check( $builder->paginate( Config::get( 'settings.paginate' )) );
        }
        return $this->check($builder->get());
    }

    protected function check($result)
    {
        if( $result->isEmpty() ){
            return FALSE;
        }
        $result->transform(function ($item, $key){
            if( is_string($item->img ) && is_object( json_decode($item->img)) && (json_last_error() == JSON_ERROR_NONE) ){
                $item->img = json_decode($item->img);
            }
            return $item;
        });
        return $result;
    }

    public function getOne($one_c_id){
        $result = $this->model->where('product_id', $one_c_id)->first();

        return $result;
    }

    public function add($input)
    {
        $model = new $this->model;
        $model->fill($input);
        $model->save();

        return $model;
    }

}