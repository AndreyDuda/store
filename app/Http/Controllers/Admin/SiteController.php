<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\SettingRepository;

class SiteController extends AdminController
{
    //
    public $user_rep;

    public function __construct(SettingRepository $setting_rep, UserRepository $user)
    {
        $this->template    = 'storejeans' . '.admin.index';
        $this->setting_rep = $setting_rep;
        $this->user_rep    = $user;
    }

    public function settings(Request $request)
    {
        if($request->isMethod('post')){
            //$request = $request->except('_token');
            $setting = $request->all();
            unset($setting['_token']);

            foreach ($setting as $item){
                $model = $this->setting_rep->getOne(key($item));
                $model->value = $item;
                $model->save();
            }
        }

        $settings = $this->setting_rep->getAll();
        $data = [
            'settings' => $settings
        ];

        $content    = view('storejeans' . '.admin.site.settings')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function addUser(Request $request)
    {
        $user = false;

        if($request->isMethod('post')){
            $id = $request->id;
            $user = $this->user_rep->getOne($id);
        }else{
            $user = $this->user_rep->getAll(['name']);
        }
        $data = [
            'user' => $user
        ];

        $content    = view('storejeans' . '.admin.site.addUser')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();

    }
}
