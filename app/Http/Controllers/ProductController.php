<?php

namespace App\Http\Controllers;

use App\Repositories\SettingRepository;
use Config;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;


class ProductController extends SiteController
{
    public function __construct(ProductRepository $product_rep, SettingRepository $setting_rep)
    {
        $this->template = 'storejeans.index';
        $this->product_rep = $product_rep;
        $this->setting_rep = $setting_rep;
    }

    public function index(Request $request, $categories = false)
    {
        $step     = $this->setting_rep->getOne('PaginateCatalog');
        $paginate = $this->setting_rep->getOne('CountProductCatalog');

        $count_p  = 8;

        $select   = ['id', 'product_id', 'title', 'price_many', 'photo_maine', 'photo1', 'photo2', 'photo3', 'photo4', 'label', 'categories'];
        $slider_p = ['id', 'product_id', 'title', 'price_many', 'photo_maine', 'label', 'categories'];
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
                $categories = ' AND females = 1';
                break;
            case 'female':
                $input['females'][0] = '2';
                $name_cat = 'Женская одежда';
                $categories = ' AND females = 2';
                break;
            case 'bestoffer':
                $input['vigoda'][0] = '1';
                $name_cat = 'Выгодные предложения';
                $categories = ' AND vigoda = 1';
                break;
            case 'new':
                $input['new'][0] = '1';
                $name_cat = 'Новинки';
                $categories = ' AND new = 1';
                break;
            case 'sale_many':
                $input['sale'][0] = '1';
                $name_cat = 'Распродажа';
                $categories = ' AND sale = 1';
                break;
            case 'all':
                $name_cat = 'Весь каталог';
                $categories = '';
                break;
            case '':
                $name_cat = 'Весь каталог';
                $categories = '';
                break;
            case 'label':
                $name_cat = $categories;
                $input['label'][0] = $categories;
                $categories = '';
            default:
                $input['categories'][0] = $categories;
                $name_cat = $categories;
                $categories = '';
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
       
        $products = $this->product_rep->getAll($select, $paginate, $where, $order);
        $slider_p = $this->product_rep->getAll($slider_p, false, 'vigoda = "1"'.$categories, false, $count_p);
        $dir      = 'storejeans'.'/img/catalog';
        $images   = scandir($dir);

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
            'cat_prod' => $cat_prod,
            'images'   => $images
        ];


        $content    = view('storejeans' . '.product.products')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $metaKey = $this->setting_rep->getOne('MetaKeySite');
        $metaDesc = $this->setting_rep->getOne('MetaDescSite');
        $metatitle = $this->setting_rep->getOne('title');
        $telephoneMTC = $this->setting_rep->getOne('telephoneMTC');
        $telephoneKiev = $this->setting_rep->getOne('telephoneKiev');

        $this->vars = array_add($this->vars, 'telephoneMTC', $telephoneMTC);
        $this->vars = array_add($this->vars, 'telephoneKiev', $telephoneKiev);
        $this->vars = array_add($this->vars, 'metaKey', $metaKey);
        $this->vars = array_add($this->vars, 'metaDesc', $metaDesc);
        $this->vars = array_add($this->vars, 'title', $metatitle);
        return $this->renderOutput();
    }



    public function show(Request $request)
    {
        $id       = $request->id;
        $count_p  = 8;
        $products = ['id', 'product_id', 'title', 'price_many', 'photo_maine', 'photo1', 'photo2', 'photo3', 'photo4', 'label', 'desc',];
        $product  = $this->product_rep->getOne($id);

        $products = $this->product_rep->getAll($products, false, 'label = "' . $product->label . '"', false, $count_p);
       // $products = $this->product_rep->getLabel($product->label);
        $dir      = 'storejeans'.'/img/catalog';
        $images   = scandir($dir);
        $data     = [
            'product'  => $product,
            'products' => $products,
            'images'   => $images
        ];
        $content    = view('storejeans' . '.product.product')->with($data)->render();
        $telephoneMTC = $this->setting_rep->getOne('telephoneMTC');
        $telephoneKiev = $this->setting_rep->getOne('telephoneKiev');
        $this->vars = array_add($this->vars, 'telephoneMTC',  $telephoneMTC);
        $this->vars = array_add($this->vars, 'telephoneKiev', $telephoneKiev);
        $metatitle = $this->setting_rep->getOne('title');
        $this->vars = array_add($this->vars, 'content', $content);
        $this->vars = array_add($this->vars, 'metaKey', $product->mets_key);
        $this->vars = array_add($this->vars, 'metaDesc', $product->mets_desc);
        $this->vars = array_add($this->vars, 'metatitle', $product->mets_desc);
        $this->vars = array_add($this->vars, 'title', $metatitle);

        return $this->renderOutput();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $where = "LOWER(label) like '%$search%' OR LOWER(title) like '%$search%' OR code like '%$search%' OR LOWER(categories) like '%$search%'";
        $count_search = 10;
        $select   = ['id', 'title', 'photo_maine', 'label'];
        $products = $this->product_rep->getAll($select, false, $where, false, $count_search);
        $data = array();
        $k=0;
        foreach ($products as $product){
            $data[$k]['id'] = $product->id;
            $data[$k]['label'] = $product->label;
            $dir      = 'storejeans'.'/img/catalog';
            $images   = scandir($dir);
            if(in_array(str_replace('catalog/', '' ,$product->photo_maine.'.jpg' ), $images )){
                $data[$k]['photo'] = $product->photo_maine;
            }
            else{
                $data[$k]['photo'] = 'system/no-image';
            }
            $k++;
        }
        return json_encode($data);
        //return json_encode($products);
    }

}
