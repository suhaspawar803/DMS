(function($) {
  'use strict';
  $(function() {
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        username: {
          required: true,
          email: true,
          minlength: 2
        },
        password: {
          required: true,
          minlength: 8
        },
        confirm_password: {
          required: true,
          minlength: 8,
          equalTo: "#password"
        }
      },
      messages: {
        username: {
          required: "Please enter a username",
          email: "Please enter a valid email address",
          minlength: "Your username must consist of at least 2 characters"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        confirm_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long",
          equalTo: "Please enter the same password as above"
        }
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    
  });
})(jQuery);