<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class AdminController extends Controller
{
    protected $product_rep;

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
