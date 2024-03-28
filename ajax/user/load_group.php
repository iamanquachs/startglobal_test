<?php
include("../../includes/config.php");
include("../../includes/database.php");
include("../../includes/functions.php");
require("../../modules/userClass.php");

$db = new User();

$data = $db->load_group();
?>
<tr>
    <th>ID</th>
    <th>Group ID</th>
    <th>Title</th>
    <th>Content</th>
    <th style="display: flex; justify-content: center;">...</th>
</tr>
<?php
foreach ($data as $r) { ?>
    <script>
        $(document).ready(function() {
            $('.<?= $r->id ?>').val(<?= $r->group_id ?>)
        })
    </script>
    <tr  >
        <td onclick="open_group('<?= $r->id ?>')"><?= $r->id ?></td>
        <td onclick="open_group('<?= $r->id ?>')"><?= $r->group_name ?></td>
        <td onclick="open_group('<?= $r->id ?>')"><?= $r->title ?></td>
        <td onclick="open_group('<?= $r->id ?>')"><?= $r->content ?></td>
        <td>
            <div style="display: flex; justify-content: center; gap: 3px;">
                <button class="btn" onclick="open_edit_group('<?= $r->id ?>','<?= $r->group_name ?>','<?= $r->title ?>','<?= $r->content ?>')">
                    Edit
                </button>
                <button class="btn" onclick="open_delete_group('<?= $r->id ?>','<?= $r->group_name?>')">
                    Delete
                </button>
            </div>

        </td>
    </tr>
<?php
}
