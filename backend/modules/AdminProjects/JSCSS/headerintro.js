// Header
convert_textarea_to_quill('HWWDTC', 'txtHWWDTC');
convert_textarea_to_quill('HWWDSC', 'txtHWWDSC');
convert_textarea_to_quill('HWWDEN', 'txtHWWDEN');

// Intro
convert_textarea_to_quill('IDetailsTC', 'txtIDetailsTC');
convert_textarea_to_quill('IDetailsSC', 'txtIDetailsSC');
convert_textarea_to_quill('IDetailsEN', 'txtIDetailsEN');

var TBLIntroImages;

$(document).ready(function() {
     // Header
     $("#imgHBanner").click(function() {
          $("#txtHBanner").click();
     });

     // Intro
     TBLIntroImages = $("#tblIntroImageLists").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/projects/introimages/getall/" + CurrentBrandtellerID,
          "order": '',
          "columns": [
               { "data": "image", "orderable": false, "width": "70%" },
               { "data": "sequence", "orderable": false, "width": "20%" },
               { "data": "actions", "orderable": false, "width": "10%" }
          ]
     });
     $("#imgIBanner").click(function() {
          $("#txtIBanner").click();
     });
     $("#btnIntroImageUpload").click(function() {
          $("#txtIImage").click();
     });
     $("#txtIImage").change(function() {
          $("#btnIImageSubmit").click();
     });
});

// Intro
function delete_intro_image_by_id(id) {
     var c = confirm("Are you sure you want to delete this image?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/projects/introimages/deletedatabyid",
               data: {
                    "id": id,
                    "current_id": CurrentBrandtellerID
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Intro Image successfully deleted.");

                         TBLIntroImages.ajax.reload();
                    }
               }
          });
     }
}
function swtich_intro_image_order(row_id, order_id, changedvalue, param_value) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/projects/introimages/switchorder",
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
                    TBLIntroImages.ajax.reload();
               }
          }
      });
}