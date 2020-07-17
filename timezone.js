$(document).ready(function () {

    //Returns the number of minutes ahead or behind GWM
    var offset = new Date().getTimezoneOffset();
    //Return the nuumber of millliseconds since 1970/01/01
    var timestamp = new Date().getTime();
    //Converting the time to Universal Time Coordinated
    var utc_timestamp = timestamp + (60000 * offset);

    $("#time_zone_offset").val(offset);
    $("#utc_timestamp").val(utc_timestamp);

});