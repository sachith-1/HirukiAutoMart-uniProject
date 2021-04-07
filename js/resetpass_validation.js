// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.

  $("form[name='resetpass']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      pass: {
        required: true,
        minlength: 8
      },
      cpass: {
        required: true,
        equalTo: "#pass"
      }
    },
    // Specify validation error messages
    messages: {
      pass: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      cpass: {
        required: "Please enter the password",
        equalTo: "Your password must be equal"
      }
    },
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
