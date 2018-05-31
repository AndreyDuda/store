<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 10.04.2018
 * Time: 19:06
 */

namespace App\Repositories;
use Config;
use Illuminate\Support\Facades\DB;


abstract class Repository
{
    protected $model = false;

    public function getOne($one_c_id){
        $result = $this->model->where('product_id', $one_c_id)->first();

        return $result;
    }

    public function getAll($select = '*', $pagination = false, $where = false, $order=false, $limit = false)
    {
        if($where){
            if($limit){
                $builder = $this->model->select($select)->whereRaw($where)->limit($limit);
            }else{
                $builder = $this->model->select($select)->whereRaw($where);
            }

        }else{
            $builder = $this->model->select($select);
        }

        if($order){
            if($order == 1){
                $builder->orderBy('price_many', 'ASC');
            }else{
                $builder->orderBy('price_many', 'DESC');
            }
        }

        if($pagination){
            return $builder->paginate( $pagination);
        }


        return$builder->get();
    }

    public function uniqueValue($select)
    {
        $builder = $this->model->distinct()->select($select);

        return $builder->get();
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

    public function add($input)
    {
        $model = new $this->model;
        $model->fill($input);
        $model->save();

        return $model;
    }

}