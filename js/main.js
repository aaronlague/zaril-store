$(document).ready(function() {


    $('.changepw').on( 'click', function () {
    $('#changePasswordModal').modal('show');


    });

    $("#changePassword").validate({
			rules: {
				new_password: {
					required: true,
					minlength: 5
				},
				confirm_new_password: {
					required: true,
					minlength: 5,
					equalTo: "#new_password"
				},
				agree: "required"
			},
			messages: {
				new_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_new_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});

});