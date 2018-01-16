

$('form').validate({
	rules: {
		password: {
			required: true,
			minlength: 6,
			maxlength: 100
		},
		password_confirm: {
			equalTo: "#password",
			minlength: 6,
			maxlength: 100
		}
	},
	messages: {
		password: {
			required: "Password is required"
		},
		password_confirm: {
			equalTo: "Passwords do not match"
		}
	}
});
