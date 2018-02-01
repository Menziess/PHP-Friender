

/**
 * Display event countdown timer.
 */
var timer = $('#timer');

function stringMaxFloor(value) {
	return String(Math.max(Math.floor(value), 0));
}
function updateTime(start, element) {
	var diff = start - new Date().getTime();
	var days = stringMaxFloor(diff / (1000 * 60 * 60 * 24));
	var hours = stringMaxFloor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
	var minutes = stringMaxFloor(diff % (1000 * 60 * 60) / (1000 * 60));
	var seconds = stringMaxFloor(diff % (1000 * 60) / 1000);
	var output = days + " dagen, "
		+ hours + " uur, "
		+ minutes + " minuten en "
		+ seconds + " seconden";

	element.text(output);
}
if (timer) {
	// Dit werkt ook op ios, anders wordt NaN getoont
	var arr = timer.text().split(/[- :]/),
		start = new Date(arr[0], arr[1] - 1, arr[2], arr[3], arr[4], arr[5]);

	updateTime(start, timer);
	setInterval(function () {
		updateTime(start, timer);
	}, 1000);
}

/**
 * Iterate through questions page.
 */
var questions = $('#questions');

if (questions.length) {

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
var chat = $('[data-ajax-form]');
var container = $('[data-ajax-container]');

if (chat.length && container.length) {
	var input = $('[data-ajax-input]');
	var height = container[0].scrollHeight;
	container.scrollTop(height);
	chat.submit(function (event) {

		// Stop default behaviour
		event.preventDefault();

		// $(this) betekent deze form met data-ajax attribute die ge-submit is
		var action = $(this).attr('action');
		var formData = $(this).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'PUT',
			url: action,
			data: formData
		}).done(function (response) {
			container.append(
				'<li class="chat-message" data-ajax-id="' + response.id + '">'
				+ response.first_name + ': ' + response.message + '<br>' +
				'<label style="font-size: 0.6em;">' + response.time + '</label>' +
				'</li>'
			);
			var height = container[0].scrollHeight;
			container.scrollTop(height);
			input.val("");
		}).fail(function (data) {
			console.error(data);
		});
	});
}
