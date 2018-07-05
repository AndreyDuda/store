<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class SiteController extends Controller
{
    //
    protected $product_rep;
    protected $order_rep;
    protected $setting_rep;

    protected $vars = array();
    protected $template;

    public function __construct()
    {

    }

    public function renderOutput()
    {

        return view($this->template)->with($this->vars);
    }
}
