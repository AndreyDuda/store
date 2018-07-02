<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_id', 'code', 'new', 'title', 'price_many', 'sale_many', 'meta_title',
        'price_one', 'sale_one', 'count', 'end_sale', 'photo_maine', 'photo1', 'photo2', 'photo3', 'meta_desc',
        'photo4', 'females', 'categories', 'sesons', 'size', 'style', 'count', 'label', 'desc', 'meta_key'];
}
