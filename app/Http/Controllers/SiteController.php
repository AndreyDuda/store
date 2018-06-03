<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class SiteController extends Controller
{
    //
    protected $product_rep;

    protected $cart = false;

    protected $vars = array();
    protected $template;

    public function __construct()
    {
        /*$this->cart = 5 ;*/
    }

    public function renderOutput()
    {
        return view($this->template)->with($this->vars);
    }
}
