<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ProductRepository;
use App\Repositories\SettingRepository;

class IndexController extends SiteController
{
    //
    public function __construct(ProductRepository $product_rep, SettingRepository $setting_rep)
    {
        $this->setting_rep = $setting_rep;
        $this->product_rep = $product_rep;


        $this->template = 'storejeans.index';
    }

    public function index()
    {

        $menDesc    = $this->setting_rep->getOne('DescMenCategory');
        $woomenDesc = $this->setting_rep->getOne('DescWoomenCategory');
        $newDesc    = $this->setting_rep->getOne('DescNewCategory');
        $saleDesc   = $this->setting_rep->getOne('DescSaleCategory');

        $data = [
            'menDesc' => $menDesc,
            'woomenDesc' => $woomenDesc,
            'newDesc' => $newDesc,
            'saleDesc' => $saleDesc
        ];

        $content = view('storejeans' . '.index.main')->with($data)->render();
        $metaKey = $this->setting_rep->getOne('MetaKeySite');
        $metaDesc = $this->setting_rep->getOne('MetaDescSite');
        $metatitle = $this->setting_rep->getOne('title');
        $telephoneMTC = $this->setting_rep->getOne('telephoneLife');
        $telephoneKiev = $this->setting_rep->getOne('telephoneKiev');



        $this->vars = array_add($this->vars, 'metaKey', $metaDesc);
        $this->vars = array_add($this->vars, 'metaKey', $telephoneKiev);
        $this->vars = array_add($this->vars, 'metaKey', $metaKey);
        $this->vars = array_add($this->vars, 'metaDesc', $metaDesc);
        $this->vars = array_add($this->vars, 'title', $metatitle);
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

}
