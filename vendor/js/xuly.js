function load_group() {
  $.post("ajax/user/load_group.php", {}, function (data, textStatus, jqXHR) {
    $("#group").html(data);
    open_group(1);
  });
}

function add_group() {
  const group_name = $("#group_name_add").val();
  const title = $("#group_title_add").val();
  const content = $("#group_content_add").val();
  $.post(
    "ajax/user/add_group.php",
    { group_name: group_name, title: title, content: content },
    function (data, textStatus, jqXHR) {
      load_group();
      $("#modal_add_group").modal("hide");
    }
  );
}

function open_edit_group(id, name, title, content) {
  $("#modal_edit_group").modal("show");
  $("#group_name").val(name);
  $("#group_title").val(title);
  $("#group_content").val(content);
  $("#group_id").val(id);
}

function edit_group() {
  const group_name = $("#group_name").val();
  const title = $("#group_title").val();
  const content = $("#group_content").val();
  const id = $("#group_id").val();
  $.post(
    "ajax/user/update_group.php",
    { id: id, group_name: group_name, title: title, content: content },
    function (data, textStatus, jqXHR) {
      load_group();
      $("#modal_edit_group").modal("hide");
    }
  );
}

function open_delete_group(id, name) {
  $("#modal_delete_group").modal("show");
  $("#group_name_delete").text(name);
  $("#group_id_delete").val(id);
}
function delete_group() {
  const id = $("#group_id_delete").val();
  $.post(
    "ajax/user/delete_group.php",
    { id: id },
    function (data, textStatus, jqXHR) {
      load_group();
      $("#modal_delete_group").modal("hide");
    }
  );
}

function open_group(id) {
  $.post(
    "ajax/user/load_product.php",
    { id: id },
    function (data, _textStatus, jqXHR) {
      $("#product").html(data);
    }
  );
}
function load_group_select() {
  $.post(
    "ajax/user/load_group_select.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#product_group_id").html(data);
      $("#product_group_id_add").html(data);
    }
  );
}

function add_product() {
  const group_id = $(`#product_group_id_add option:selected`).val();
  const name = $("#product_name_add").val();
  $.post(
    "ajax/user/add_product.php",
    { group_id: group_id, name: name },
    function (data, textStatus, jqXHR) {
      load_group();
      $("#modal_add_product").modal("hide");
    }
  );
}

function open_edit_product(id, group_id, name) {
  $("#modal_edit_product").modal("show");
  $("#product_group_id").val(group_id);
  $("#product_name").val(name);
  $("#product_id").val(id);
}



function edit_product() {
  const group_id = $(`#product_group_id option:selected`).val();
  const name = $("#product_name").val();
  const id = $("#product_id").val();
  $.post(
    "ajax/user/update_product.php",
    { id: id, group_id: group_id, name: name },
    function (data, textStatus, jqXHR) {
      load_group();
      $("#modal_edit_product").modal("hide");
    }
  );
}

function open_delete_product(id, name) {
  $("#modal_delete_product").modal("show");
  $("#product_name_delete").text(name);
  $("#product_id_delete").val(id);
}
function delete_product() {
  const id = $("#product_id_delete").val();
  $.post(
    "ajax/user/delete_product.php",
    { id: id },
    function (data, textStatus, jqXHR) {
      load_group();
      $("#modal_delete_product").modal("hide");
    }
  );
}

function import_excel() {
  var form_data = new FormData();
  var file = $("#file_excel")[0].files[0];
  form_data.append("file", file);
  $.ajax({
    type: "POST",
    url: "ajax/user/import_user.php",
    data: form_data,
    contentType: false,
    processData: false,
    headers: {
      "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
    },
    success: function (response) {
      $("#path_file").val(response);
    },
  });
}
