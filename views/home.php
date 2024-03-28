<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <base href="https://localhost/startglobal"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDIA- ĐỒI XANH</title>
    <script type="text/javascript" src="vendor/js/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/js/xuly.js?v=<?= md5_file('vendor/js/xuly.js') ?>"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }

    .btn {
        background-color: #04AA6D;
        padding: 5px;
        color: white;
        border-radius: 5px;
        border: none;
    }

    .btn:hover {
        cursor: pointer;
        background-color: #048958;
    }
</style>

<body>
    <div style="margin: 10px ;display: flex;justify-content: space-between;align-items: center;">


    </div>
    <div style="display: flex; margin: auto; justify-content: center;">
        <div style=" border-right: #ddd solid 1px; margin-right: 20px; padding-right: 20px;">
            <div style="display: flex;justify-content: space-between;align-items: center; gap: 10px;">
                <input type="file" id="file_excel" name='file_excel' onchange="import_excel()">
                <form action="Import" method="POST">
                    <input id="path_file_group" name='path_file_group' hidden>
                    <input name='loai' value='group' hidden>

                    <button class="btn">Import excel group</button>
                </form>

                <form action="Export" method="POST">
                    <button class="btn">Export excel group</button>
                    <input name='loai' value='group' hidden>

                </form>
                <button class="btn" data-toggle="modal" data-target="#modal_add_group">Add group</button>
            </div>
            <div style="max-height: 70vh; overflow-y:scroll">
                <table id="group" class="table">

                </table>
            </div>
        </div>
        <div>
            <div style="display: flex;justify-content: space-between;align-items: center; gap: 10px;">
                <input type="file" id="file_excel" name='file_excel' onchange="import_excel()">
                <form action="Import" method="POST">
                    <input id="path_file_product" name='path_file_product' hidden>
                    <input name='loai' value='product' hidden>

                    <button class="btn">Import excel product</button>
                </form>

                <form action="Export" method="POST">
                    <input name='loai' value='product' hidden>
                    <button class="btn">Export excel product</button>

                </form>
                <button class="btn" data-toggle="modal" data-target="#modal_add_product">Add Product</button>
            </div>
            <div style="max-height: 70vh; overflow-y:scroll">

                <table id="product" class="table">

                </table>
            </div>
        </div>
    </div>
    <!-- Modal add group -->
    <div class="modal" id="modal_add_group">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ADD GROUP</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input id="group_name_add" placeholder='Name'>
                    <input id="group_title_add" placeholder='Title'>
                    <input id="group_content_add" placeholder='Content'>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button onclick="add_group()" type="button" class="btn btn-danger">Save</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal edit group -->
    <div class="modal" id="modal_edit_group">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">EDIT</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <input id="group_name">
                    <input id="group_title">
                    <input id="group_content">
                    <input id="group_id" hidden>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button onclick="edit_group()" type="button" class="btn btn-danger">Save</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal delete group -->
    <div class="modal" id="modal_delete_group">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">DELETE</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <p id="group_name_delete"></p>
                    <input id="group_id_delete" hidden>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button onclick="delete_group()" type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal add product -->
    <div class="modal" id="modal_add_product">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ADD PRODUCT</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <select id="product_group_id_add">

                    </select>
                    <input id="product_name_add">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button onclick="add_product()" type="button" class="btn btn-danger">Save</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal edit product -->
    <div class="modal" id="modal_edit_product">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">EDIT</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <select id="product_group_id">

                    </select>
                    <input id="product_name">
                    <input id="product_id" hidden>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button onclick="edit_product()" type="button" class="btn btn-danger">Save</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal delete product -->
    <div class="modal" id="modal_delete_product">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">DELETE</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <p id="product_name_delete"></p>
                    <input id="product_id_delete" hidden>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button onclick="delete_product()" type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            load_group();
            load_group_select()
        });
    </script>
</body>

</html>