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
            $setting = $request->except('_token');;


            foreach ($setting as $k=>$item){
                $model = $this->setting_rep->getOne($k);
               /* dd($model);*/
                $model->value = ($item)? $item:'';
                $model->save();
            }
        }

        $settings = $this->setting_rep->getAllSet();
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
            $user = $this->user_rep->getOneForSeve($id);
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

    public function user()
    {
        $users = $this->user_rep->getAll('*');

        $data = [
            'users' => $users
        ];
        $content    = view('storejeans' . '.admin.site.user')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        $metatitle = $this->setting_rep->getOne('title');
        $this->vars = array_add($this->vars, 'title', $metatitle);
        return $this->renderOutput();

    }

}
