<?php
include 'functions.php';
include("includes/PHPExcel/PHPExcel.php");

$loai = $_POST['loai'];
$objPHPExcel = new PHPExcel();
$list_data =  load_data($loai);
if ($loai == 'group') {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'ID')
        ->setCellValue('B1', 'Group Name')
        ->setCellValue('C1', 'Title')
        ->setCellValue('D1', 'Content');
    // Add some data
    $key = 0;
    $stt = 1;
    foreach ($list_data as $i) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . ($key + 2), $i->id)
            ->setCellValue('B' . ($key + 2), $i->group_name)
            ->setCellValue('C' . ($key + 2), $i->title)
            ->setCellValue('D' . ($key + 2), $i->content);
        $key++;
    }

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Group');
} else {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'ID')
        ->setCellValue('B1', 'Group ID')
        ->setCellValue('C1', 'Name');
    // Add some data
    $key = 0;
    $stt = 1;
    foreach ($list_data as $i) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . ($key + 2), $i->id)
            ->setCellValue('B' . ($key + 2), $i->group_id)
            ->setCellValue('C' . ($key + 2), $i->name);
        $key++;
    }

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Product');
}

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

header("Location:index.html");
