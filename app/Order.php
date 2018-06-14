<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'telephone', 'fio', 'email', 'country','city','oplata','delivery','product','comment','new'
    ];
}
