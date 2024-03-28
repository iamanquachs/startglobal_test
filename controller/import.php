<?php
include 'functions.php';
include("includes/PHPExcel/PHPExcel.php");
//  Include thư viện PHPExcel_IOFactory vào


$inputFileName = $_POST['path_file_product'];

$loai = $_POST['loai'];
if ($loai  == 'group') {
    $inputFileName = $_POST['path_file_group'];
}

// $inputFileName = 'vendor/file/data.xls';
//  Tiến hành đọc file excel
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
    die('Lỗi không thể đọc file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}

//  Lấy thông tin cơ bản của file excel

// Lấy sheet hiện tại
$sheet = $objPHPExcel->getSheet(0);

// Lấy tổng số dòng của file, trong trường hợp này là 6 dòng
$highestRow = $sheet->getHighestRow();

// Lấy tổng số cột của file, trong trường hợp này là 4 dòng
$highestColumn = $sheet->getHighestColumn();

// Khai báo mảng $rowData chứa dữ liệu

//  Thực hiện việc lặp qua từng dòng của file, để lấy thông tin
for ($row = 2; $row <= $highestRow; $row++) {
    // Lấy dữ liệu từng dòng và đưa vào mảng $rowData
    $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
}

//In dữ liệu của mảng
for ($i = 0; $i < count($rowData); $i++) {
    for ($j = 0; $j < count($rowData[$i]); $j++) {
        if ($loai == 'group') {
            if ($rowData[$i][$j][1] == 3) {
                add_data_group($rowData[$i][$j][0], $rowData[$i][$j][1], $rowData[$i][$j][2], $rowData[$i][$j][3]);
            }
        } else {
            if ($rowData[$i][$j][1] == 3) {
                add_data_product($rowData[$i][$j][0], $rowData[$i][$j][1], $rowData[$i][$j][2]);
            }
        }
    }
}
header("Location:index.html");
