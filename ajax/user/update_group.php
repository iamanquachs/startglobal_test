<?php
include("../../includes/config.php");
include("../../includes/database.php");
include("../../includes/functions.php");
require("../../modules/userClass.php");

$db = new User();
$id = $_POST['id'];
$group_name = $_POST['group_name'];
$title = $_POST['title'];
$content = $_POST['content'];
$db->update_group($group_name, $id, $title, $content);
