<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SettingRepository;

class DeliveryController extends SiteController
{
    public function __construct(SettingRepository $setting_rep)
    {
        $this->template = 'storejeans.index';
        $this->setting_rep = $setting_rep;
    }

    public function index()
    {
        $data       = [

        ];
        $content    = view(env('THEME') . '.delivery.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $metaKey = $this->setting_rep->getOne('MetaKeyContact');
        $metaDesc = $this->setting_rep->getOne('MetaDescContact');
        $metatitle = $this->setting_rep->getOne('title');
        $telephoneMTC = $this->setting_rep->getOne('telephoneMTC');
        $telephoneKiev = $this->setting_rep->getOne('telephoneKiev');

        $this->vars = array_add($this->vars, 'telephoneMTC',  $telephoneMTC);
        $this->vars = array_add($this->vars, 'telephoneKiev', $telephoneKiev);
        $this->vars = array_add($this->vars, 'metaKey', $metaKey);
        $this->vars = array_add($this->vars, 'metaDesc', $metaDesc);
        $this->vars = array_add($this->vars, 'title', $metatitle);

        return $this->renderOutput();
    }
}
