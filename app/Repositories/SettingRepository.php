<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 16.06.2018
 * Time: 20:50
 */

namespace App\Repositories;


use App\Setting;

class SettingRepository extends Repository
{

    public  function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function getOne($option)
    {
        $result = $this->model->where('option', $option)->first();

        return $result->value;
    }
    public function getOneForSeve($option)
    {
        $result = $this->model->where('option', $option)->first();

        return $result;
    }
    public function getAllSet()
    {
        $builder = $this->model->select('*');
        $builder->orderBy('id', 'ASC');
        return $builder->get();
    }
}