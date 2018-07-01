<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\SettingRepository;

class SiteController extends AdminController
{
    //
    public function __construct(SettingRepository $setting_rep)
    {
        $this->template    = 'storejeans' . '.admin.index';
        $this->setting_rep = $setting_rep;
    }

    public function settings()
    {
        $settings = $this->setting_rep->getAll();
        $data = [
            'settings' => $settings
        ];

        $content    = view('storejeans' . '.admin.site.settings')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
}
