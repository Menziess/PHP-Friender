
/**
 * Add validator for special characters.
 */
jQuery.validator.addMethod("specialChar", function (value, element) {
	return this.optional(element) || /([0-9a-zA-Z\s])$/.test(value);
}, "No special characters allowed.");

/**
 * Form validation.
 */
$('form').each(function () {
	$(this).validate({
		rules: {
			first_name: {
				specialChar: true,
				maxlength: 100,
			},
			last_name: {
				specialChar: true,
				maxlength: 100,
			},
			date_of_birth: {
				date: true
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 100
			},
			password_old: {
				required: true,
				minlength: 6,
				maxlength: 100
			},
			password_confirm: {
				equalTo: "#password",
				minlength: 6,
				maxlength: 100
			},
			image: {
				required: true,
			}
		},
		messages: {
			password: {
				required: "Password is required."
			},
			password_confirm: {
				equalTo: "Passwords do not match."
			},
			image: {
				required: "Please select an image."
			}
		}
	});
});
