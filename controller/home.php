<?php
//! không được require lại các class đã khai báo trong home

switch ($components) {
        //User
    case 'Export':
        require_once CONTROLS . 'export.php';
        break;
    case 'Import':
        require_once CONTROLS . 'import.php';
        break;

    default:

        $filename = 'home';
        break;
}
