<?php

require_once 'PHPExcel.php';
include 'header.html';

    $filepath = '../../products1.xlsx';
    $inputFileType = PHPExcel_IOFactory::identify($filepath);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);

    $excel = $objReader->load($filepath);

foreach($excel ->getWorksheetIterator() as $worksheet) {
    $lists[] = $worksheet->toArray();

}
echo '1';
Illuminate\Support\Facades\Session::flash('dbExcel', $lists);
echo 'до';
return true;
echo 'после';
/*return redirect()->route('excelWrite',['data' => $lists]);*/







/*foreach($lists as $list){
 echo '<table border="1">';
 // Перебор строк
 foreach($list as $row){
   echo '<tr>';
   // Перебор столбцов
   foreach($row as $col){
     echo '<td>'.$col;

     if(preg_match('#загальна#su', $col))
     {
     		$boole = true;
     		echo 'ON</td>';
     }
     else if(preg_match('#Зміни#su', $col))
     {
     		$boole = false;
     		echo 'OFF</td>';
     }
     else
     {
     	echo '</td>';
     }

    
 }
 echo '</tr>';
 }
 echo '</table>';

}*/


