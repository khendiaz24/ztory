var q_toolbar = [
     ['bold', 'italic', 'underline'],
     [{ 'list': 'ordered'}, { 'list': 'bullet' }]
];

// OS
var q_os_details_tc = new Quill("#OSBDetailsTC", {
     modules: {
          toolbar: q_toolbar
     },
     theme: 'snow'
});
q_os_details_tc.on('text-change', function(delta, oldDelta, source) {
     document.getElementById("txtOSBDetailsTC").value = q_os_details_tc.root.innerHTML;
});
var q_os_details_sc = new Quill("#OSBDetailsSC", {
     modules: {
          toolbar: q_toolbar
     },
     theme: 'snow'
});
q_os_details_sc.on('text-change', function(delta, oldDelta, source) {
     document.getElementById("txtOSBDetailsSC").value = q_os_details_sc.root.innerHTML;
});
var q_os_details_en = new Quill("#OSBDetailsEN", {
     modules: {
          toolbar: q_toolbar
     },
     theme: 'snow'
});
q_os_details_en.on('text-change', function(delta, oldDelta, source) {
     document.getElementById("txtOSBDetailsEN").value = q_os_details_en.root.innerHTML;
});

var TBLOBB;
var TBLOC;
var TBLOS;
var TBLOWC;

$(document).ready(function() {
     // Intro
     $("#imgBanner").click(function() {
          $("#txtIMGBanner").click();
     });

     // OBB
     TBLOBB = $("#tblOBB").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/aboutus/obb/getall",
          "order": '',
          "columns": [
               { "data": "id", "orderable": false, "width": "1%" },
               { "data": "image", "orderable": false, "width": "15%" },
               { "data": "label", "orderable": false, "width": "21%" },
               { "data": "label_sc", "orderable": false, "width": "21%" },
               { "data": "label_en", "orderable": false, "width": "21%" },
               { "data": "order", "orderable": false, "width": "16%" },
               { "data": "actions", "orderable": false, "width": "5%" }
          ]
     });
     $("#imgOBBIcon").click(function() {
          $("#txtOBBIMGIcon").click();
     });
     $("#btnOBBClose").click(function() {
          $("#imgOBBIcon").attr("src", BASE_URL + "/public/themes/global/images/default_image.jpg");
          $("#txtOBBIMGIcon").val("");
          $("#txtOLDOBBIMGIcon").val("");
          $("#txtOBBLabelTC").val("");
          $("#txtOBBLabelSC").val("");
          $("#txtOBBLabelEN").val("");
          $("#txtOBBID").val("");
          $("#txtOBBProcess").val("add");

          $("#mdl_obb").modal("hide");
     });

     // OC
     TBLOC = $("#tblOC").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/aboutus/oc/getall",
          "order": '',
          "columns": [
               { "data": "id", "orderable": false, "width": "1%" },
               { "data": "title", "orderable": false, "width": "45%" },
               { "data": "details", "orderable": false, "width": "45%" },
               { "data": "actions", "orderable": false, "width": "9%" }
          ]
     });
     $("#btnOCClose").click(function() {
          $("#txtOCTitleTC").val("");
          $("#txtOCTitleSC").val("");
          $("#txtOCTitleEN").val("");
          $("#txtOCDetailsTC").val("");
          $("#txtOCDetailsSC").val("");
          $("#txtOCDetailsEN").val("");
          $("#txtOCID").val("");
          $("#txtOCProcess").val("add");

          $("#mdl_oc").modal("hide");
     });

     // OS
     TBLOS = $("#tblOS").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/aboutus/os/getall",
          "order": '',
          "columns": [
               { "data": "id", "orderable": false, "width": "1%" },
               { "data": "category", "orderable": false, "width": "45%" },
               { "data": "details", "orderable": false, "width": "45%" },
               { "data": "actions", "orderable": false, "width": "9%" }
          ]
     });
     $("#btnOSBClose").click(function() {
          $("#txtOSBCategoryTC").val("");
          $("#txtOSBCategorySC").val("");
          $("#txtOSBCategoryEN").val("");
          $("#txtOSBDetailsTC").val("");
          $("#txtOSBDetailsSC").val("");
          $("#txtOSBDetailsEN").val("");
          $("#txtOSBID").val("");
          $("#txtOSBProcess").val("add");

          q_os_details_tc.setText("");
          q_os_details_sc.setText("");
          q_os_details_en.setText("");

          $("#mdl_os").modal("hide");
     });

     // OWC
     TBLOWC = $("#tblOWC").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/aboutus/owc/getall",
          "order": '',
          "columns": [
               { "data": "id", "orderable": false, "width": "1%" },
               { "data": "image", "orderable": false, "width": "90%" },
               { "data": "actions", "orderable": false, "width": "9%" }
          ]
     });
     $("#btnUOWCClientLogo").click(function() {
          $("#txtOWCLogo").click();  
     });
     $("#txtOWCLogo").change(function() {
          $("#btnOWCSubmit").click();
     });
});

// OBB
function get_obb_by_id(id) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/aboutus/obb/getdatabyid",
          data: {
               "id": id,
          },
          error: function(req, error) {
               console.log(req.statusText);
          },
          success: function(msg) {
               var xMSG = msg.split("*");

               $("#imgOBBIcon").attr("src", BASE_URL + "/public/assets/uploads/aboutus/" + xMSG[0]);
               $("#txtOBBIMGIcon").removeAttr("required");
               $("#txtOLDOBBIMGIcon").val(xMSG[0]);
               $("#txtOBBLabelTC").val(xMSG[1]);
               $("#txtOBBLabelSC").val(xMSG[2]);
               $("#txtOBBLabelEN").val(xMSG[3]);
               $("#txtOBBID").val(id);
               $("#txtOBBProcess").val("edit");

               $("#mdl_obb").modal('show');
          }
     });
}
function delete_obb_by_id(id) {
     var c = confirm("Are you sure you want to delete this data?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/aboutus/obb/deletedatabyid",
               data: {
                    "id": id,
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Our Brand Blueprint data successfully deleted.");

                         TBLOBB.ajax.reload();
                    }
               }
          });
     }
}
function switch_obb_order(row_id, order_id, changedvalue) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/aboutus/obb/switchorder",
          data: {
               "DataID": row_id,
               "CurrentPosition": order_id,
               "ToSwitchPosition": changedvalue.value
          },
          error: function(req, error) {
               console.log(req.statusText);
          },
          success: function(msg) {
               if (msg == "ok") {
                    TBLOBB.ajax.reload();
               }
          }
     });
}

// OC
function get_oc_by_id(id) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/aboutus/oc/getdatabyid",
          data: {
               "id": id,
          },
          error: function(req, error) {
               console.log(req.statusText);
          },
          success: function(msg) {
               var xMSG = msg.split("*");

               $("#txtOCTitleTC").val(xMSG[0]);
               $("#txtOCTitleSC").val(xMSG[1]);
               $("#txtOCTitleEN").val(xMSG[2]);
               $("#txtOCDetailsTC").val(xMSG[3]);
               $("#txtOCDetailsSC").val(xMSG[4]);
               $("#txtOCDetailsEN").val(xMSG[5]);
               $("#txtOCID").val(id);
               $("#txtOCProcess").val("edit");

               $("#mdl_oc").modal('show');
          }
     });
}
function delete_oc_by_id(id) {
     var c = confirm("Are you sure you want to delete this data?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/aboutus/oc/deletedatabyid",
               data: {
                    "id": id,
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Our Concept data successfully deleted.");

                         TBLOC.ajax.reload();
                    }
               }
          });
     }
}

// OS
function get_os_by_id(id) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/aboutus/os/getdatabyid",
          data: {
               "id": id,
          },
          error: function(req, error) {
               console.log(req.statusText);
          },
          success: function(msg) {
               var xMSG = msg.split("*");

               $("#txtOSBCategoryTC").val(xMSG[0]);
               $("#txtOSBCategorySC").val(xMSG[1]);
               $("#txtOSBCategoryEN").val(xMSG[2]);
               $("#txtOSBDetailsTC").val(xMSG[3]);
               $("#txtOSBDetailsSC").val(xMSG[4]);
               $("#txtOSBDetailsEN").val(xMSG[5]);

               q_os_details_tc.clipboard.dangerouslyPasteHTML(0, xMSG[3]);
               q_os_details_sc.clipboard.dangerouslyPasteHTML(0, xMSG[4]);
               q_os_details_en.clipboard.dangerouslyPasteHTML(0, xMSG[5]);
               
               $("#txtOSBID").val(id);
               $("#txtOSBProcess").val("edit");

               $("#mdl_os").modal('show');
          }
     });
}
function delete_os_by_id(id) {
     var c = confirm("Are you sure you want to delete this data?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/aboutus/os/deletedatabyid",
               data: {
                    "id": id,
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Data successfully deleted.");

                         TBLOS.ajax.reload();
                    }
               }
          });
     }
}

// OWC
function delete_owc_by_id(id) {
     var c = confirm("Are you sure you want to delete this client's logo?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/aboutus/owc/deletedatabyid",
               data: {
                    "id": id,
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Client's Logo successfully deleted.");

                         TBLOWC.ajax.reload();
                    }
               }
          });
     }
}