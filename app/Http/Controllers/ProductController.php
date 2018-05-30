<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;


class ProductController extends SiteController
{
    public function __construct(ProductRepository $product_rep)
    {
        $this->template = env('THEME') . '.index';
        $this->product_rep = $product_rep;
    }

    public function index(Request $request, $categories = false)
    {
        $step     = Config::get( 'settings.paginateStep' );
        $paginate = Config::get( 'settings.paginate' );
        $select   = ['product_id', 'title', 'price_many', 'females', 'photo', 'label', 'desc'];
        $slider_p = ['title', 'desc', 'photo', 'price'];
        $where    = false;
        $input    = false;
        $order    = false;
        $name_cat = false;

        $country  = $this->product_rep->uniqueValue('country');
        $sesons   = $this->product_rep->uniqueValue('sesons');
        $lable    = $this->product_rep->uniqueValue('label');
        $style    = $this->product_rep->uniqueValue('style');
        $size     = $this->product_rep->uniqueValue('size');

        $input = $request->input();
       // dd($categories);
        unset($input['page']);
        $order = (array_key_exists('sort', $input))? $input['sort'] : false;
        unset($input['sort']);

        switch($categories) {
            case 'male':
                $input['females'][0] = '1';
                $name_cat = 'Женская одежда';
                break;
            case 'female':
                $input['females'][0] = '2';
                $name_cat = 'Мужская одежда';
                break;
            case 'bestoffer':
                $input['sale'][0] = '1';
                $name_cat = 'Выгодные предложения';
                break;
            case 'new':
                $input['sale'][0] = '1';
                $name_cat = 'Новинки';
                break;
            case 'sale':
                $input['sale'][0] = '1';
                $name_cat = 'Распродажа';
                break;
            case 'all':
                $name_cat = 'Весь каталог';
                break;
        }

            if(count($input)){
              //  $input = $request->except('_token');

                $or = 0;
                foreach ($input as $k=>$item){
                   $col = $k;
                   $and = 0;
                    foreach ($item as $i){
                        $where .= ($or == 0 || $or > 0 && $and == 0 )? '':' OR ';
                        $where .= ($or > 0 && $and == 0 )? ' AND ':'';
                        $where .=  $col . " = '" . $i . "'";

                        ++$or;
                        ++$and;
                    }
                }
            }

            //dd($where);

        $products = $this->product_rep->getAll($select, $paginate, $where, $order);
        $slider_p = $this->product_rep->getAll($slider_p, false, 'sale = "1"', false, 8);

        $data     = [
            'products' => $products,
            'slider_p' => $slider_p,
            'step'     => $step,
            'lable'    => $lable,
            'country'  => $country,
            'style'    => $style,
            'size'     => $size,
            'sesons'   => $sesons,
            'input'    => $input,
            'order'    => $order,
            'category' => $categories,
            'name_cat' => $name_cat
        ];


        $content    = view(env('THEME') . '.product.products')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function show(Request $request)
    {
        $id       = $request->id;
        $product  = $this->product_rep->getOne($id);
       // $products = $this->product_rep->getLabel($product->label);
        $products = false;
        $data     = [
            'product'  => $product,
            'products' => $products
        ];
        $content    = view(env('THEME') . '.product.product')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

}
