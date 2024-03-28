<?php
include("../../includes/config.php");
include("../../includes/database.php");
include("../../includes/functions.php");
require("../../modules/userClass.php");

$db = new User();
$id = $_POST['id'];
$data = $db->load_product($id);
?>
<tr style="gap: 5px;">
    <th>ID</th>
    <th>Group ID</th>
    <th>Name</th>
    <th style="display: flex; justify-content: center; gap: 3px;">...</th>
</tr>
<?php
foreach ($data as $r) { ?>
    <tr>
        <td><?= $r->id ?></td>
        <td><?= $r->group_name ?></td>
        <td><?= $r->name ?></td>
        <td>
            <div style="display: flex; justify-content: center; gap: 3px;">
                <button class="btn" onclick="open_edit_product('<?= $r->id ?>','<?= $r->group_id ?>','<?= $r->name ?>')">
                    Edit
                </button>
                <button class="btn" onclick="open_delete_product('<?= $r->id ?>','<?= $r->name ?>')">
                    Delete
                </button>
            </div>
        </td>
    </tr>
<?php
}
