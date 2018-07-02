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
        $this->template    = 'storejeans' . '.admin.index';
        $this->product_rep = $product_rep;
    }

    public function updateProduct(Request $request)
    {
        if($request->isMethod('post')){
            $input = $request->input();
            $request = $request->except('_token');
            dd($request);
        }

        return redirect()->route('editProduct')->with('status', 'Заказ успешно отправлен');
    }

    public function editProduct(Request $request)
    {
        if($request->isMethod('post')){
            $input = $request;
            $input = $input->except('_token');
            $product  = $this->product_rep->getOne($request->id);
            $product->update($input);
        }

        $country  = $this->product_rep->uniqueValue('country');
        $sesons   = $this->product_rep->uniqueValue('sesons');
        $label    = $this->product_rep->uniqueValue('label');
        $style    = $this->product_rep->uniqueValue('style');
        $size     = $this->product_rep->uniqueValue('size');
        $cat_prod = $this->product_rep->uniqueValue('categories');
        $females = $this->product_rep->uniqueValue('females');

        $dir        = 'storejeans'.'/img/catalog';
        $images     = scandir($dir);

        $id = ($request->id)? $request->id:false;
        $product  = $this->product_rep->getOne($id);
        if($request->id && $product) {

            $data = [
                'product' => $product,
                'images' => $images,
                'country' => $country,
                'sesons' => $sesons,
                'label' => $label,
                'style' => $style,
                'size' => $size,
                'cat_prod' => $cat_prod,
                'females' => $females
            ];

            $content = view('storejeans' . '.admin.product.editProduct')->with($data)->render();
            $this->vars = array_add($this->vars, 'content', $content);
            return $this->renderOutput();
        }else{
            abort('404');
        }

    }


    public function index()
    {
        $step     = Config::get( 'settings.paginateStep' );
        $paginate = Config::get( 'settings.paginate' );
        $select   = ['product_id', 'code', 'title', 'price_many', 'label'];
        $where    = false;
        $order    = false;
        $products = $this->product_rep->getAll($select, $paginate, $where, $order);
        $data = [
            'products' => $products,
            'step'     => $step
        ];

        $content    = view('storejeans' . '.admin.product.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function uploadExcelFile()
    {
        $content    = view('storejeans' . '.admin.product.uploadExcelFile')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }


    public function addProduct(Request $request)
    {
        $content    = view('storejeans' . '.admin.product.uploadProduct')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
}
