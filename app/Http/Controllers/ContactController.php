<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SettingRepository;

class ContactController extends SiteController
{
    public function __construct(SettingRepository $setting_rep)
    {
        $this->setting_rep = $setting_rep;

        $this->template = 'storejeans.index';
    }

    public function index()
    {
        $data       = [

        ];

        $content    = view(env('THEME') . '.contact.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $metaKey = $this->setting_rep->getOne('MetaKeyContact');
        $metaDesc = $this->setting_rep->getOne('MetaDescContact');
        $metatitle = $this->setting_rep->getOne('title');
        $telephoneMTC = $this->setting_rep->getOne('telephoneLife');
        $telephoneKiev = $this->setting_rep->getOne('telephoneKiev');

        $this->vars = array_add($this->vars, 'telephoneMTC', $metaDesc);
        $this->vars = array_add($this->vars, 'telephoneKiev', $telephoneKiev);
        $this->vars = array_add($this->vars, 'metaKey', $metaKey);
        $this->vars = array_add($this->vars, 'metaDesc', $metaDesc);
        $this->vars = array_add($this->vars, 'title', $metatitle);

        return $this->renderOutput();
    }
}
