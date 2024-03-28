<?php
include("../../includes/config.php");
include("../../includes/database.php");
include("../../includes/functions.php");
require("../../modules/userClass.php");

$db = new User();

$data = $db->load_group();

foreach ($data as $r) { ?>
    <option value="<?= $r->id ?>"><?= $r->group_name ?></option>
<?php
}
