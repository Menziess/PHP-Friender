

/**
 * Form validation.
 */
$('form').each(function () {
	$(this).validate({
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
});

// var question_number = document.getElementById("question_number")

// 			function progress() {
// 				console.log(question_number.value)
// 				question_number.value++
// 			}
