$(document).ready(function() {
  $("#email").blur(function() {
    var email = $(this).val();

    $.ajax({
      url: "includesemailAvailability.php",
      method: "POST",
      data: {
        email_val: email
      },
      success: function(data) {
        if (data != 0) {
          $("#user-availability-status").html(
            "<span>Username blah not available</span>"
          );
          $("#register").attr("disabled", true);
        } else {
          $("#user-availability-status").html(
            "<span>Username blah Available</span>"
          );
          $("#register").attr("disabled", false);
        }
      }
    });
  });
});

// 2nd try NOT WORKING...
function checkAvailability() {
  $("#email").addClass("loading");
  jQuery.ajax({
    url: "../includes/emailAvailabiity.php",
    data: "email=" + $("#email").val(),
    type: "POST",
    success: function(data) {
      $("#email").removeClass("loading");
      $("#user-availability-status").html(data);
    },
    error: function() {}
  });
}
