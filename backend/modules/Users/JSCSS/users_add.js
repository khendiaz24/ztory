$(document).ready(function() {
    $("#imgUserPhoto").click(function() {
		  $("#txtUserPhoto").click();
    });

    $("#phone").keypress(function(event) {
			return NumericOnly(event);
		});
    
    $("#btnPostSubmit").click(function() {
        var ProfilePhoto = $("#txtUserPhoto").val();
        var FirstName = $("#first_name").val();
        var LastName = $("#last_name").val();
        var Email = $("#email").val();
        var Phone = $("#phone").val();
        var Position = $("#position").val();
        var StaffID = $("#staffid").val();
        var Role = $("#role").val();
        var ProfilePhotoHolder = $("#txtUserPhotoHolder").val();

        //Validation
        if (ProfilePhoto == "") {
          alert("Profile Photo field is required.");
        } else if (FirstName == "") {
          alert("First Name field is required.");
        } else if (LastName == "") {
          alert("Last Name fields is required.");
        } else if (!validateEmail(Email)) {
          alert("Please enter a valid email address.");
        } else if (Phone == "" || Phone == "0") {
          alert("Contact Number field is required.");
        } else if (Position == "") {
          alert("Position field is required.");
        } else if (StaffID == "") {
          alert("Staff ID is required.");
        } else {
          //Verify if user is already exists
          $.ajax({
            type: "POST",
            async: false,
            url: BASE_URL + "/admin/users/saveuser",
            data: {
              "ProfilePhotoHolder": ProfilePhotoHolder,
              "FirstName": FirstName,
              "LastName": LastName,
              "Email": Email,
              "Phone": Phone,
              "Position": Position,
              "StaffID": StaffID,
              "Role": Role
            },
            error: function(req, error) {
              console.log(req.statusText);
            },
            success: function(msg) {
              var xMsg = msg.split('|');

              if (xMsg[0] == "ok") {
                alert("New User Successfully Created\n" + xMsg[1]);
                
                window.location.href = BASE_URL + "/admin/users";
              } else if (msg == "duplicate") {
                alert("Email Address is already exists.");
              } else {
                alert("Failed to send email notification. Please check the SMTP details.");
              }
            }
          });
        }
    });
});
