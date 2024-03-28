<?php

function load_data($loai)
{
    $query = "SELECT * FROM product order by `name` limit 10";
    if ($loai == 'group') {
        $query = "SELECT * FROM `group` order by group_name";
    }
    $database = new database();
    $getall = $database->connect->prepare("$query");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function add_data_group($id, $group_name, $title, $content)
{
    $database = new database();
    $getall = $database->connect->prepare("INSERT INTO `group`(id,group_name,title, content) VALUES('$id','$group_name','$title', '$content')");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function add_data_product($id, $group_id, $name)
{
    $database = new database();
    $getall = $database->connect->prepare("INSERT INTO product(id,group_id,`name`) VALUES('$id','$group_id','$name')");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}
