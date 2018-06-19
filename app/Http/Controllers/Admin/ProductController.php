<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Config;
use App\Http\Controllers\Admin\BackService\Excel\ExcelController;


class ProductController extends AdminController
{
    public function __construct(ProductRepository $product_rep)
    {
        $this->template    = env('THEME') . '.admin.index';
        $this->product_rep = $product_rep;
    }

    public function editProduct()
    {
        $data = [

        ];

        $content    = view(env('THEME') . '.admin.product.editProduct')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }


    public function index()
    {
        $step     = Config::get( 'settings.paginateStep' );
        $paginate = Config::get( 'settings.paginate' );
        $select   = ['product_id', 'code', 'title', 'price_many', 'photo', 'label'];
        $where    = false;
        $order    = false;
        $products = $this->product_rep->getAll($select, $paginate, $where, $order);
        $data = [
            'products' => $products,
            'step'     => $step
        ];

        $content    = view(env('THEME') . '.admin.product.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function uploadExcelFile()
    {
        $content    = view(env('THEME') . '.admin.product.uploadExcelFile')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function uploadProductFile(Request $request)
    {
        $content    = view(env('THEME') . '.admin.product.uploadProduct')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
}
