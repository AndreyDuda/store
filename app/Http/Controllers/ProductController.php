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
        $where    = false;
        $input    = false;
        $order    = false;
        $name_cat = false;


        $lable    = $this->product_rep->uniqueValue('label');
        $country  = $this->product_rep->uniqueValue('country');
        $style    = $this->product_rep->uniqueValue('style');
        $size     = $this->product_rep->uniqueValue('size');
        $sesons   = $this->product_rep->uniqueValue('sesons');


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
                break;
            case 'new':
                $input['sale'][0] = '1';
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

        $data     = [
            'products' => $products,
            'step'     => $step,
            'lable'    => $lable,
            'country'  => $country,
            'style'    => $style,
            'size'     => $size,
            'sesons'   => $sesons,
            'input'    => $input,
            'order'    => $order,
            'category' => $name_cat
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
