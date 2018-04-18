<?php
/**
 * Created by PhpStorm.
 * User: dudav
 * Date: 17.04.2018
 * Time: 20:28
 */

namespace App\Http\Controllers\BackService\excel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


require_once 'PHPExcel.php';
use PHPExcel_IOFactory;
class ExcelController extends Controller
{
    public function ex()
    {
        $filepath = '../products1.xlsx';
        $inputFileType = PHPExcel_IOFactory::identify($filepath);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);

        $excel = $objReader->load($filepath);

        foreach($excel ->getWorksheetIterator() as $worksheet) {
            $lists[] = $worksheet->toArray();
        }

        dd($lists);
    }


}