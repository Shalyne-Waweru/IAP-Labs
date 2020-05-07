// validating the form when it's submitted
function validateForm(){
    var fname = document.forms["user_details"]["first_name"].value;
    var lname = document.forms["user_details"]["last_name"].value;
    var city = document.forms["user_details"]["user_city"].value;

    if (fname == null || lname == "" || city == ""){
        alert("All required details were not supplied!");
        return false;
    }
    return true;
}