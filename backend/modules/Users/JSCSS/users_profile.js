$(document).ready(function() {
    $("#imgUserPhoto").click(function() {
		  $("#txtUserPhoto").click();
    });

    $("#phone").keypress(function(event) {
        return NumericOnly(event);
    });
    
    $("#btnPostSubmit").click(function() {
        var FirstName = $("#first_name").val();
        var LastName = $("#last_name").val();
        var Phone = $("#phone").val();
        var ProfilePhotoHolder = $("#txtUserPhotoHolder").val();
        var UserId = $("#txtUserID").val();

        //Validation
        if (FirstName == "") {
          alert("First Name field is required.");
        } else if (LastName == "") {
          alert("Last Name fields is required.");
        } else if (Phone == "" || Phone == "0") {
          alert("Contact Number field is required.");
        } else {
          //Verify if user is already exists
          $.ajax({
            type: "POST",
            async: false,
            url: BASE_URL + "/admin/users/updateuserprofile",
            data: {
              "ProfilePhotoHolder": ProfilePhotoHolder,
              "FirstName": FirstName,
              "LastName": LastName,
              "Phone": Phone,
              "UserID": UserId
            },
            error: function(req, error) {
              console.log(req.statusText);
            },
            success: function(msg) {
              if (msg == "ok") {
                alert("User Profile Successfully Updated");
                
                window.location.href = BASE_URL + "/admin/users/user_profile";
              }
            }
          });
        }
    });

    $("#btnCPPostSubmit").click(function() {
        var OldPassword = $("#oldPassword").val();
        var NewPassword = $("#newPassword").val();
        var ConfirmPassword = $("#confirmNewPassword").val();
        var UserID = $("#txtUserID").val();

        if (OldPassword == "") {
            alert("Please enter your old password.");
        } else if (NewPassword == "") {
            alert("Please enter your new password.");
        } else if (ConfirmPassword != NewPassword) {
            alert("Please confirm your new password.");
        } else {
            $.ajax({
                type: "POST",
                async: false,
                url: BASE_URL + "/admin/users/updateuserchangepassword",
                data: {
                  "OldPassword": OldPassword,
                  "NewPassword": NewPassword,
                  "UserID": UserID
                },
                error: function(req, error) {
                  console.log(req.statusText);
                },
                success: function(msg) {
                  if (msg == "ok") {
                    alert("User Profile Successfully Updated");
                    
                    window.location.href = BASE_URL + "/admin/users/user_profile";
                  } else if (msg == "invalidpassword") {
                    alert("Please enter your correct password.");
                  }
                }
            });
        }
    });
});
