<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ProductRepository;

class ImageController extends AdminController
{
    public function __construct(ProductRepository $product_rep)
    {
        $this->template    = env('THEME') . '.admin.index';
        $this->product_rep = $product_rep;
    }

    public function index()
    {
        $dir        = env('THEME').'/img/catalog';
        $images     = scandir($dir);
        $data       = [
            'images' => $images
        ];

        $content    = view(env('THEME') . '.admin.image.index')->with($data)->render();
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
        $dir        = env('THEME').'/img/catalog/';
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
            $image = scandir($dir);;
        }
        $data       = [
            'images' => $images
        ];
        $content    = view(env('THEME') . '.admin.image.unused')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    public function uploadImage(Request $request)
    {
        if($request->isMethod('post')){
            foreach ($request->file() as $file){
                foreach ($file as $f){
                    $f->move(env('THEME').'/img/catalog', $f->getClientOriginalName());
                }
            }
            dd($request->file('image'));
        }
        $data = [

        ];
        $content    = view(env('THEME') . '.admin.image.upload')->with($data)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderOutput();
    }
}
