// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.

  $("form[name='regUser']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      first_name: "required",
      last_name: "required",
      address: "required",
      phone: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
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
      first_name: "Please enter your firstname",
      last_name: "Please enter your lastname",
      pass: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      cpass: {
        required: "Please enter the password",
        equalTo: "Your password must be equal"
      },
      email: "Please enter a valid email address",
      address: "Please enter your address",
      phone: "Please enter your phone number"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
