<?php
include("../../includes/config.php");
include("../../includes/database.php");
include("../../includes/functions.php");
require("../../modules/userClass.php");

$db = new User();
$group_id = $_POST['group_id'];
$name = $_POST['name'];
$db->add_product($group_id,  $name);
