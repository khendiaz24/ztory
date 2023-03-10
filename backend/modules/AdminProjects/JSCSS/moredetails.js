convert_textarea_to_quill('MDDetailsTC', 'txtMDDetailsTC');
convert_textarea_to_quill('MDDetailsSC', 'txtMDDetailsSC');
convert_textarea_to_quill('MDDetailsEN', 'txtMDDetailsEN');

var TBLMoreDetailsImageLists;

$(document).ready(function() {
     TBLMoreDetailsImageLists = $("#tblMoreDetailsImageLists").DataTable({
          "bLengthChange": false,
          "pageLength": 5,
          "ajax": BASE_URL + "/admin/projects/mdimages/getall/" + CurrentBrandtellerID,
          "order": '',
          "columns": [
               { "data": "image", "orderable": false, "width": "50%" },
               { "data": "type", "orderable": false, "width": "20%" },
               { "data": "sequence", "orderable": false, "width": "20%" },
               { "data": "actions", "orderable": false, "width": "10%" }
          ]
     });
     // Image Type = 0
     $("#imgMDFWImage").click(function() {
          $("#txtMDFWImage").click();
     });
     // Image Type = 1
     $("#imgMDLImage2").click(function() {
          $("#txtMDLImage2").click();
     });
     $("#imgMDRImage2").click(function() {
          $("#txtMDRImage2").click();
     });
     // Image Type = 2
     $("#imgMDLImage3").click(function() {
          $("#txtMDLImage3").click();
     });
     $("#imgMDRTImage3").click(function() {
          $("#txtMDRTImage3").click();
     });
     $("#imgMDRBImage3").click(function() {
          $("#txtMDRBImage3").click();
     });

     $("#txtMDImageType").change(function() {
          if ($(this).val() == "2") {
               $("#imgtype1").hide();
               $("#imgtype2").show();
               $("#imgtype3").hide();
          } else if ($(this).val() == "3") {
               $("#imgtype1").hide();
               $("#imgtype2").hide();
               $("#imgtype3").show();
          } else {
               $("#imgtype1").show();
               $("#imgtype2").hide();
               $("#imgtype3").hide();
          }
     });

     $("#btnMDCLose").click(function() {
          $("#imgMDFWImage").attr("src", BASE_URL + "/public/themes/global/images/default_image.jpg");
          $("#txtMDFWImage").val("");

          $("#imgMDLImage2").attr("src", BASE_URL + "/public/themes/global/images/default_image.jpg");
          $("#txtMDLImage2").val("");
          $("#imgMDRImage2").attr("src", BASE_URL + "/public/themes/global/images/default_image.jpg");
          $("#txtMDRImage2").val("");
          
          $("#imgMDLImage3").attr("src", BASE_URL + "/public/themes/global/images/default_image.jpg");
          $("#txtMDLImage3").val("");
          $("#imgMDRTImage3").attr("src", BASE_URL + "/public/themes/global/images/default_image.jpg");
          $("#txtMDRTImage3").val("");
          $("#imgMDRBImage3").attr("src", BASE_URL + "/public/themes/global/images/default_image.jpg");
          $("#txtMDRBImage3").val("");

          $("#mdl_md").modal("hide");
     });
});

function delete_md_image_by_id(id) {
     var c = confirm("Are you sure you want to delete this image?");

     if (c) {
          $.ajax({
               type: "POST",
               async: false,
               url: BASE_URL + "/admin/projects/mdimages/deletedatabyid",
               data: {
                    "id": id,
                    "current_id": CurrentBrandtellerID
               },
               error: function(req, error) {
                    console.log(req.statusText);
               },
               success: function(msg) {
                    if (msg == "ok") {
                         alert("Image successfully deleted.");

                         TBLMoreDetailsImageLists.ajax.reload();
                    }
               }
          });
     }
}
function swtich_md_image_order(row_id, order_id, changedvalue, param_value) {
     $.ajax({
          type: "POST",
          async: false,
          url: BASE_URL + "/admin/projects/mdimages/switchorder",
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
                    TBLMoreDetailsImageLists.ajax.reload();
               }
          }
      });
}