var TBLLists;
var TBLCatLists;

$(document).ready(function() {
     TBLLists = $("#tblLists").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/projects/getall",
          "order": '',
          "columns": [
               { "data": "id", "orderable": false, "width": "1%" },
               { "data": "banner", "orderable": false, "width": "15%" },
               { "data": "title", "orderable": false, "width": "34%" },
               { "data": "client", "orderable": false, "width": "30%" },
               { "data": "status", "orderable": false, "width": "15%" },
               { "data": "actions", "orderable": false, "width": "5%" }
          ]
     });

     $("#imgBanner").click(function() {
          $("#txtIMGBanner").click();
     });

     $("#btnClose").click(function() {
          $("#imgBanner").attr("src", BASE_URL + "/public/themes/global/images/default_image.jpg");
          $("#txtIMGBanner").val("");
          $("#txtTitleTC").val("");
          $("#txtTitleSC").val("");
          $("#txtTitleEN").val("");
          $("#txtDetailsTC").val("");
          $("#txtDetailsSC").val("");
          $("#txtDetailsEN").val("");
          $("#txtClientTC").val("");
          $("#txtClientSC").val("");
          $("#txtClientEN").val("");
          $("#txtTemplate").val("1");

          $("#mdl").modal("hide");
     });

     // Categories
     TBLCatLists = $("#tblCatLists").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/projects/categories/getall",
          "order": '',
          "columns": [
               { "data": "id", "orderable": false, "width": "1%" },
               { "data": "nametc", "orderable": false, "width": "30%" },
               { "data": "namesc", "orderable": false, "width": "30%" },
               { "data": "nameen", "orderable": false, "width": "30%" },
               { "data": "actions", "orderable": false, "width": "9%" }
          ]
     });
     $("#btnCClose").click(function() {
          $("#txtCNameTC").val("");
          $("#txtCNameSC").val("");
          $("#txtCNameEN").val("");
          $("#txtCID").val("");
          $("#txtCProcess").val("add");

          $("#mdl_cat").modal("hide");
     });
});

function get_cat_by_id(id) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/projects/categories/getdatabyid",
          data: {
               "id": id,
          },
          error: function(req, error) {
               console.log(req.statusText);
          },
          success: function(msg) {
               var xMsg = msg.split("*");

               $("#txtCNameTC").val(xMsg[0]);
               $("#txtCNameSC").val(xMsg[1]);
               $("#txtCNameEN").val(xMsg[2]);
               $("#txtCID").val(id);
               $("#txtCProcess").val("edit");

               $("#mdl_cat").modal("show");
          }
     });
}