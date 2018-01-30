

/**
 * Display event countdown timer.
 */
var timer = $('#timer');
function updateTime(element) {
	var diff = date - new Date().getTime();
	var days = Math.floor(diff / (1000 * 60 * 60 * 24));
	var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((diff % (1000 * 60)) / 1000);
	var output = days + " dagen, "
		+ hours + " uur, "
		+ minutes + " minuten en "
		+ seconds + " seconden";

	element.text(output);
}
if (timer) {
	var date = Date.parse(timer.text());
	updateTime(timer);
	setInterval(function () {
		updateTime(timer);
	}, 1000);
}

/**
 * Iterate through questions page.
 */
var questions = $('#questions');
if (questions) {

	var vraag = 1;
	var question_number = document.getElementById("question_number");

	function showQuestion(nr) {
		$('.question:not(#' + nr + ')').hide();
		$('.question#' + nr).show();
	}

	function next() {
		if (vraag < 23) vraag++;
		else questions.submit();
		showQuestion(vraag);
		question_number.value++
	}
	function previous() {
		if (vraag > 1) vraag--;
		showQuestion(vraag);
		question_number.value--
	}

	$('input[type=radio]').on('click', function () {
		next();
	});

	showQuestion(vraag);
}

/**
 * Navigates to location.
 */
function navigate(location, delay = 1000) {
	setTimeout(function () {
		window.location.href = location;
	}, delay);
}

/**
 * Add validator for special characters.
 */
$.validator.addMethod("specialChar", function (value, element) {
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

/**
 * Ajax form submission.
 *
 * data-ajax-form: 		submitted form
 * data-ajax-input: 	input
 * data-ajax-container: contains appended responses
 * data-ajax-id:		elements within container
 */
$('[data-ajax-form]').submit(function (event) {

	// Stop default behaviour
	event.preventDefault();

	// $(this) betekent deze form met data-ajax attribute die ge-submit is
	var action = $(this).attr('action');
	var formData = $(this).serialize();
	var container = $('[data-ajax-container]');
	var input = $('[data-ajax-input]');

	// Submit the form using AJAX.
	$.ajax({
		type: 'PUT',
		url: action,
		data: formData
	}).done(function (response) {
		console.log(response);
		container.prepend(
			'<li data-ajax-id="' + response.id + '">'
			+ response.time + ' - ' + response.first_name + ': ' + response.message +
			'</li>'
		);
		input.val("");
	}).fail(function (data) {
		console.error(data);
	});
});
