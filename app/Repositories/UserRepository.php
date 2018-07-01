<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 01.07.2018
 * Time: 6:22
 */

namespace App\Repositories;
use App\User;

class UserRepository extends Repository
{
    public  function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getOne($id)
    {
        $result = $this->model->where('id', $id)->first();

        return $result;
    }
}