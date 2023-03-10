var TBLLearnMoreImageLists;

$(document).ready(function() {
     TBLLearnMoreImageLists = $("#tblLearnMoreImageLists").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/projects/learnmoreimage/getall/" + CurrentBrandtellerID,
          "order": '',
          "columns": [
               { "data": "image", "orderable": false, "width": "70%" },
               { "data": "sequence", "orderable": false, "width": "20%" },
               { "data": "actions", "orderable": false, "width": "10%" }
          ]
     });
     
     $("#imgLMImage").click(function() {
          $("#txtLMImage").click();
     });

     $("#btnLearnMoreImageUpload").click(function() {
          $("#txtLMImages").click();
     });

     $("#txtLMImages").change(function() {
          $("#btnLMImageSubmit").click();
     });
});

function delete_learnmore_image_by_id(id) {
     var c = confirm("Are you sure you want to delete this image?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/projects/learnmoreimage/deletedatabyid",
               data: {
                    "id": id,
                    "current_id": CurrentBrandtellerID
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Learn More Image successfully deleted.");

                         TBLLearnMoreImageLists.ajax.reload();
                    }
               }
          });
     }
}
function swtich_learnmore_image_order(row_id, order_id, changedvalue, param_value) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/projects/learnmoreimage/switchorder",
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
                    TBLLearnMoreImageLists.ajax.reload();
               }
          }
      });
}