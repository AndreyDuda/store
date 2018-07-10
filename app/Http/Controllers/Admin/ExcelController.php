<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{


    public function parse(Request $request)
    {
        if(!$request->hasFile('excel')){
            return redirect()->back()->with('status', 'Проблемы при отправке Excel');
        }
        $filepath = $request->file('excel');
        $data = [
            'filepath' => $filepath
        ];

        $data =  view(env('THEME') .'.Excel.index')->with($data)->render();
        if($data){
            return redirect()->route('excelWrite');
        }else{
            $request->session()->flash('Error.excel', 'Ошибка работы парсера Excel');
            return redirect()->route('excelWrite');
        }
    }

    public function write(Request $request)
    {
        if( $request->session()->has('Error.excel') && !$request->session()->pull('dbExcel')){
            dd($request->session()->pull('Error.excel'));
        }
        $dbExcel = $request->session()->pull('dbExcel');
        $count = count($dbExcel[0]);
        for($i=1; $i<$count; $i++){
            DB::table('products')->insert(

                    [
                        'product_id'  => isset($dbExcel[0][$i][0])  ? $dbExcel[0][$i][0]  : 0 ,
                        'code'        => isset($dbExcel[0][$i][1])  ? $dbExcel[0][$i][1]  : 1 ,
                        'new'         => isset($dbExcel[0][$i][2])  ? $dbExcel[0][$i][2]  : 0 ,
                        'title'       => isset($dbExcel[0][$i][3])  ? $dbExcel[0][$i][3]  : 'нет названия' ,
                        'price_many'  => isset($dbExcel[0][$i][4])  ? $dbExcel[0][$i][4]  : 0 ,
                        'sale_many'   => isset($dbExcel[0][$i][5])  ? $dbExcel[0][$i][5]  : 0 ,
                        'price_one'   => isset($dbExcel[0][$i][6])  ? $dbExcel[0][$i][6]  : 0 ,
                        'sale_one'    => isset($dbExcel[0][$i][7])  ? $dbExcel[0][$i][7]  : 0 ,
                        'count'       => isset($dbExcel[0][$i][8])  ? $dbExcel[0][$i][8]  : 0 ,
                        'end_sale'    => isset($dbExcel[0][$i][9])  ? $dbExcel[0][$i][9]  : 0 ,
                        'photo_maine' => isset($dbExcel[0][$i][10]) ? $dbExcel[0][$i][10] : '',
                        'photo1'      => isset($dbExcel[0][$i][11]) ? $dbExcel[0][$i][11] : '',
                        'photo2'      => isset($dbExcel[0][$i][12]) ? $dbExcel[0][$i][12] : '',
                        'photo3'      => isset($dbExcel[0][$i][13]) ? $dbExcel[0][$i][13] : '',
                        'photo4'      => isset($dbExcel[0][$i][14]) ? $dbExcel[0][$i][14] : '',
                        'females'     => isset($dbExcel[0][$i][15]) ?($dbExcel[0][$i][15]=='Женская Одежда')? 2:1:0,
                        'categories'  => isset($dbExcel[0][$i][16]) ? $dbExcel[0][$i][16] : 'Другое' ,
                        'sesons'      => isset($dbExcel[0][$i][17]) ? $dbExcel[0][$i][17] : 'Другое' ,
                        'size'        => isset($dbExcel[0][$i][18]) ? $dbExcel[0][$i][18] : 'Другое' ,
                        'style'       => isset($dbExcel[0][$i][19]) ? $dbExcel[0][$i][19] : 'Другое' ,
                        'country'     => isset($dbExcel[0][$i][20]) ? $dbExcel[0][$i][20] : 'Другое' ,
                        'label'       => isset($dbExcel[0][$i][21]) ? $dbExcel[0][$i][21] : 'Другое' ,
                        'desc'        => isset($dbExcel[0][$i][22]) ? $dbExcel[0][$i][22] : 'Нет описания' ,
                        'meta_title'  => isset($dbExcel[0][$i][23]) ? $dbExcel[0][$i][23] : '' ,
                        'meta_desc'   => isset($dbExcel[0][$i][24]) ? $dbExcel[0][$i][24] : '' ,
                        'meta_key'    => isset($dbExcel[0][$i][25]) ? $dbExcel[0][$i][25] : '' ,

                    ]
                );


        }
       return redirect()->route('uploadFileForm')->with('status', 'Excel файл успешно обработан и загружен в базу');

    }

}
