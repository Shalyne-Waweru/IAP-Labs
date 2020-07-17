// 1.validating the form when it's submitted
function validateForm(){
    var fname = document.forms["user_details"]["first_name"].value;//"user_details" is the name of the form
    var lname = document.forms["user_details"]["last_name"].value;
    var city = document.forms["user_details"]["user_city"].value;

//"user_details" is the name of the form

    if (fname == null || lname == "" || city == ""){
        alert("All required details were not supplied!");
        return false;
    }else{
        return true;
    }
}