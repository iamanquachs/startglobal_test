<?php
include("../../includes/config.php");
include("../../includes/database.php");
include("../../includes/functions.php");
require("../../modules/userClass.php");

$db = new User();
$group_name = $_POST['group_name'];
$title = $_POST['title'];
$content = $_POST['content'];
$db->add_group($group_name,  $title, $content);
