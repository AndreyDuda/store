<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ProductRepository;

class ImageController extends AdminController
{
    public function __construct(ProductRepository $product_rep, SettingRepository $setting_rep)
    {
        $this->template    = 'storejeans' . '.admin.index';
        $this->product_rep = $product_rep;
        $this->setting_rep = $setting_rep;
    }

    public function index()
    {
        $dir        = 'storejeans'.'/img/catalog';
        $images     = scandir($dir);
        $data       = [
            'images' => $images
        ];

        $content    = view('storejeans' . '.admin.image.index')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function unusedImage(Request $request)
    {


        $select     = ['photo_maine', 'photo1', 'photo2', 'photo3', 'photo4'];
        $where      = false;
        $order      = false;
        $paginate   = false;
        $images     = [];
        $products   = $this->product_rep->getAll($select, $paginate, $where, $order);
        $dir        = 'storejeans'.'/img/catalog/';
        $tempImages = scandir($dir);
        foreach ($tempImages as $image){
            $copy = false;
            foreach ($products as $product){
                if($product->photo_maine.'.jpg' == 'catalog/' . $image){
                    $copy = true;
                }elseif($product->photo1.'.jpg' == 'catalog/' . $image){
                    $copy = true;
                }elseif($product->photo2.'.jpg' == 'catalog/' . $image){
                    $copy = true;
                }elseif($product->photo3.'.jpg' == 'catalog/' . $image){
                    $copy = true;
                }elseif($product->photo4.'.jpg' == 'catalog/' . $image){
                    $copy = true;
                }
            }
            if(!$copy && $image != '.' && $image != '..'){
                $images[] = $image;
            }

        }
        $images = array_unique($images);

        if($request->isMethod('post')){
            if($request->del){
                unlink($dir .$request->del);
            }else {
                foreach ($images as $image) {
                    if ($image != '.' && $image != '..') {
                        unlink($dir . $image);
                    }
                }
            }
            $images = [];
        }
        $data       = [
            'images' => $images
        ];
        $content    = view('storejeans' . '.admin.image.unused')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        $metatitle = $this->setting_rep->getOne('title');
        $this->vars = array_add($this->vars, 'title', $metatitle);
        return $this->renderOutput();
    }

    public function uploadImage(Request $request)
    {
        if($request->isMethod('post')){
            $name = '';
            foreach ($request->file() as $file){
                foreach ($file as $f) {
                    $name = $f->getClientOriginalName();
                    $f->move(public_path().'/storejeans'.'/img/catalog' , $name);
                }
            }
            $request->file('image');
        }
        $data = [

        ];
        $content    = view('storejeans' . '.admin.image.upload')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        $metatitle = $this->setting_rep->getOne('title');
        $this->vars = array_add($this->vars, 'title', $metatitle);
        return $this->renderOutput();
    }
}
