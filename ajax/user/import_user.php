<?php
include("../../includes/config.php");
include("../../includes/database.php");



$file = $_FILES['file'];
$duoi = explode('.', $file['name']);
$maso = $duoi[0] . rand(1000, 9999);
$duoi = $duoi[(count($duoi) - 1)];
$path_image = $maso . '.' . $duoi;
move_uploaded_file($file['tmp_name'], '../../upload/' . $path_image);
$inputFileName = 'upload/' . $path_image;
header('Content-Type: application/json');
echo json_encode($inputFileName);