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
        $this->setting_rep = $setting_rep;
    }

    public function index()
    {
        $setting = $this->setting_rep->getAll();
        dd($setting);
    }
}
