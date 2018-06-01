<?php

namespace App\Http\Controllers\Admin\BackService\Excel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function parse(Request $request)
    {
        $filepath = '../products1.xlsx';

        $data =  view(env('THEME') .'\Excel\index')->render();
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
                        'product_id' => isset($dbExcel[0][$i][0]) ? $dbExcel[0][$i][0]   : 0 ,
                        'code'       => isset($dbExcel[0][$i][1]) ? $dbExcel[0][$i][1]   : 1 ,
                        'title'      => isset($dbExcel[0][$i][2]) ? $dbExcel[0][$i][2]   : 'нет названия' ,
                        'price_many' => isset($dbExcel[0][$i][3]) ? $dbExcel[0][$i][3]   : 0 ,
                        'price_one'  => isset($dbExcel[0][$i][4]) ? $dbExcel[0][$i][4]   : 0 ,
                        'count'      => isset($dbExcel[0][$i][5]) ? $dbExcel[0][$i][5]   : 0 ,
                        'photo'      => isset($dbExcel[0][$i][6]) ? $dbExcel[0][$i][6]   : 0 ,
                        'females'    => isset($dbExcel[0][$i][11])? ($dbExcel[0][$i][11] == 'мужские товары')? '1': '2' : '0' ,
                        'categories' => isset($dbExcel[0][$i][12])? $dbExcel[0][$i][12]  : 'нет категории' ,
                        'sesons'     => isset($dbExcel[0][$i][13])? $dbExcel[0][$i][13]  : 'остальное' ,
                        'size'       => isset($dbExcel[0][$i][14])? $dbExcel[0][$i][14]  : 'нет размера' ,
                        'style'      => isset($dbExcel[0][$i][15])? $dbExcel[0][$i][15]  : 'нет стиля' ,
                        'country'    => isset($dbExcel[0][$i][16])? $dbExcel[0][$i][16]  : 'нет страны' ,
                        'label'      => isset($dbExcel[0][$i][17])? $dbExcel[0][$i][17]  : 'нет фирмы' ,
                        'desc'       => isset($dbExcel[0][$i][18])? $dbExcel[0][$i][18]  : 'нет описания' ,
                        'meta_title' => isset($dbExcel[0][$i][19])? $dbExcel[0][$i][19]  : 'нет описания' ,
                        'meta_desc'  => isset($dbExcel[0][$i][20])? $dbExcel[0][$i][20]  : 'нет описания' ,
                        'meta_key'   => isset($dbExcel[0][$i][21])? $dbExcel[0][$i][21]  : 'нет описания' ,
                        'sale'       => isset($dbExcel[0][$i][22])? $dbExcel[0][$i][22]  : 0
                    ]
                );


        }
        dd($dbExcel[0]);

    }

}
