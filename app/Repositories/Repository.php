<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 10.04.2018
 * Time: 19:06
 */

namespace App\Repositories;


abstract class Repository
{
    protected $model = false;

    public function getAll()
    {
        $bulder = $this->model->select('*');

        return $bulder->get();
    }

    public function getOne($one_c_id){
        $result = $this->model->where('1c_id', $one_c_id)->first();

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