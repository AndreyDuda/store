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

Illuminate\Support\Facades\Session::flash('dbExcel', $lists);






