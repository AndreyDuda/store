<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 10.06.2018
 * Time: 20:27
 */

namespace App\Repositories;

use App\Request as Request_model;
use Validator;


class RequestRepository extends Repository
{
    public  function __construct(Request_model $request)
    {
        $this->model = $request;
    }

    public function validator($input)
    {
        $validator = Validator::make($input, [
            'telephone' => 'required',
            'fio'       => 'required'
        ]);

        return $validator;
    }

}


