<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Request extends Model
{
    protected $table = 'request';

    protected $fillable = [
        'telephone', 'fio', 'country','city','oplata','delivery','product','comment','new'
    ];
}
