<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;


class ProductController extends SiteController
{
    public function __construct(ProductRepository $product_rep)
    {
        parent::__construct();
        $this->template = env('THEME') . '.index';
        $this->product_rep = $product_rep;
    }

    public function index(Request $request, $categories = false)
    {
        $step     = Config::get( 'settings.paginateStep' );
        $paginate = Config::get( 'settings.paginate' );
        $count_p  = 8;
        $select   = ['product_id', 'title', 'price_many', 'photo', 'label'];
        $slider_p = ['product_id', 'title', 'price_many', 'photo', 'label'];
        $where    = false;
        $input    = false;
        $order    = false;
        $name_cat = false;

        $country  = $this->product_rep->uniqueValue('country');
        $sesons   = $this->product_rep->uniqueValue('sesons');
        $lable    = $this->product_rep->uniqueValue('label');
        $style    = $this->product_rep->uniqueValue('style');
        $size     = $this->product_rep->uniqueValue('size');
        $cat_prod = $this->product_rep->uniqueValue('categories');

        $input = $request->input();
       // dd($categories);
        unset($input['page']);
        $order = (array_key_exists('sort', $input))? $input['sort'] : false;
        unset($input['sort']);
       /* dd($this->cart);*/
        switch($categories) {
            case 'male':
                $input['females'][0] = '1';
                $name_cat = 'Мужская одежда';
                break;
            case 'female':
                $input['females'][0] = '2';
                $name_cat = 'Женская одежда';
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
            case '':
                $name_cat = 'Весь каталог';
                break;
            default:
                $input['categories'][0] = $categories;
                $name_cat = $categories;
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
        /*dd($where);*/
        $products = $this->product_rep->getAll($select, $paginate, $where, $order);

        $slider_p = $this->product_rep->getAll($slider_p, false, 'sale = "1"', false, $count_p);

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
            'name_cat' => $name_cat,
            'cat_prod' => $cat_prod
        ];


        $content    = view(env('THEME') . '.product.products')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function show(Request $request)
    {
        $id       = $request->id;
        $count_p  = 8;
        $products = ['product_id', 'title', 'price_many', 'photo', 'label', 'desc',];
        $product  = $this->product_rep->getOne($id);

        $products = $this->product_rep->getAll($products, false, 'label = "' . $product->label . '"', false, $count_p);
       // $products = $this->product_rep->getLabel($product->label);

        $data     = [
            'product'  => $product,
            'products' => $products
        ];
        $content    = view(env('THEME') . '.product.product')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

}
