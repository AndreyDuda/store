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

    public function getOne($id){
        $result = $this->model->where('id', $id)->first();

        return $result;
    }

    public function deleteAll(){
        $this->model->select('*')->delete();
    }

    public function count()
    {
        return $this->model->select('*')->count();
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
        $model->save($input);

        return $model;
    }
    public function update($input)
    {
        $model = $this->model;
        $model->fill($input);
        $model->save($input);
    }






    public function test()
    {
        return 'test';
    }


}