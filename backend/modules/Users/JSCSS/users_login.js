function validate_login()
{
    var Username = $("#username").val();
    var Password = $("#password").val();

    if (Username == "" && Password == "") {
        alert("Please provide login details.");
        return false;
    } else if (!validateEmail(Username)) {
        alert("Please enter your valid email.");
        return false;
    } else if (Password == "") {
        alert("Please enter your password.");
        return false;
    } else {
        return true;
    }
}