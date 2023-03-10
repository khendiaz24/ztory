convert_textarea_to_quill('BVDetailsTC', 'txtBVDetailsTC');
convert_textarea_to_quill('BVDetailsSC', 'txtBVDetailsSC');
convert_textarea_to_quill('BVDetailsEN', 'txtBVDetailsEN');

var TBLBVImageLists;

$(document).ready(function() {
     TBLBVImageLists = $("#tblBrandVolumeImageLists").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/projects/bvimages/getall/" + CurrentBrandtellerID,
          "order": '',
          "columns": [
               { "data": "image", "orderable": false, "width": "70%" },
               { "data": "sequence", "orderable": false, "width": "20%" },
               { "data": "actions", "orderable": false, "width": "10%" }
          ]
     });

     $("#btnBrandVolumeUpload").click(function() {
          $("#txtBVImages").click();
     });

     $("#txtBVImages").change(function() {
          $("#btnBVImageSubmit").click();
     });
});

function delete_bv_image_by_id(id) {
     var c = confirm("Are you sure you want to delete this image?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/projects/bvimages/deletedatabyid",
               data: {
                    "id": id,
                    "current_id": CurrentBrandtellerID
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Branch Volume Image successfully deleted.");

                         TBLBVImageLists.ajax.reload();
                    }
               }
          });
     }
}
function swtich_bv_image_order(row_id, order_id, changedvalue, param_value) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/projects/bvimages/switchorder",
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
                    TBLBVImageLists.ajax.reload();
               }
          }
      });
}