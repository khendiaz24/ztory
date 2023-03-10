convert_textarea_to_quill('EventDetailsTC', 'txtEventDetailsTC');
convert_textarea_to_quill('EventDetailsSC', 'txtEventDetailsSC');
convert_textarea_to_quill('EventDetailsEN', 'txtEventDetailsEN');

var TBLEventImageLists;

$(document).ready(function() {

     TBLEventImageLists = $("#tblEventImageLists").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/projects/eventimage/getall/" + CurrentBrandtellerID,
          "order": '',
          "columns": [
               { "data": "image", "orderable": false, "width": "70%" },
               { "data": "sequence", "orderable": false, "width": "20%" },
               { "data": "actions", "orderable": false, "width": "10%" }
          ]
     });

     $("#btnEventUpload").click(function() {
          $("#txtEventImages").click();
     });

     $("#txtEventImages").change(function() {
          $("#btnEventImageSubmit").click();
     });
});

function delete_event_image_by_id(id) {
     var c = confirm("Are you sure you want to delete this image?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/projects/eventimage/deletedatabyid",
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

                         TBLEventImageLists.ajax.reload();
                    }
               }
          });
     }
}
function swtich_event_image_order(row_id, order_id, changedvalue, param_value) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/projects/eventimage/switchorder",
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
                    TBLEventImageLists.ajax.reload();
               }
          }
      });
}