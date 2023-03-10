convert_textarea_to_quill('BADetailsTC', 'txtBADetailsTC');
convert_textarea_to_quill('BADetailsSC', 'txtBADetailsSC');
convert_textarea_to_quill('BADetailsEN', 'txtBADetailsEN');

var TBLBAImageLists;

$(document).ready(function() {

     TBLBAImageLists = $("#tblBranchApproachImageLists").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/projects/baimages/getall/" + CurrentBrandtellerID,
          "order": '',
          "columns": [
               { "data": "image", "orderable": false, "width": "70%" },
               { "data": "sequence", "orderable": false, "width": "20%" },
               { "data": "actions", "orderable": false, "width": "10%" }
          ]
     });

     $("#btnBrandApproachUpload").click(function() {
          $("#txtBAImages").click();
     });

     $("#txtBAImages").change(function() {
          $("#btnBAImageSubmit").click();
     });
});

function delete_ba_image_by_id(id) {
     var c = confirm("Are you sure you want to delete this image?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/projects/baimages/deletedatabyid",
               data: {
                    "id": id,
                    "current_id": CurrentBrandtellerID
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Branch Approach Image successfully deleted.");

                         TBLBAImageLists.ajax.reload();
                    }
               }
          });
     }
}
function swtich_ba_image_order(row_id, order_id, changedvalue, param_value) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/projects/baimages/switchorder",
          data: {
               "DataID": row_id,
               "CurrentPosition": order_id,
               "ToSwitchPosition": changedvalue.value,
               "CustomParam": param_value
          },
          error: function(req, error) {
              console.log(req.statusText);
          },
          success: function(msg) {     
               if (msg == "ok") {
                    TBLBAImageLists.ajax.reload();
               }
          }
      });
}