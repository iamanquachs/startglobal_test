<?php
include("../../includes/config.php");
include("../../includes/database.php");
include("../../includes/functions.php");
require("../../modules/userClass.php");

$db = new User();
$group_id = $_POST['group_id'];
$id = $_POST['id'];
$name = $_POST['name'];
$db->update_product($group_id, $id, $name);
