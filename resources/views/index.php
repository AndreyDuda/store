<?php

require_once '../app/Helpers/excel/PHPExcel.php';


    $filepath = '../products1.xlsx';
    $inputFileType = PHPExcel_IOFactory::identify($filepath);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);

    $excel = $objReader->load($filepath);

foreach($excel ->getWorksheetIterator() as $worksheet) {
    $lists[] = $worksheet->toArray();
}
/*
return redirect()->route('ex')->with('lists', $lists);*/












	/*$objPHPExcel = new PHPExcel();

	$objPHPExcel->setActiveSheetIndex(0);

	$active_sheet = $objPHPExcel->getActiveSheet();



	

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');*/


















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


