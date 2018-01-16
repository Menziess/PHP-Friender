
<? include 'template/head.php' ?>

<div class="container">

	<script>
	function validatePassword() {

		var pwd = document.getElementById("password")[0].value;
		var pwd_confirm = document.getElementById("password-confirm")[0].value;

		alert(pad, " ", pwd_confirm)

		if (pwd != pwd_confirm) {
			alert("Passwords Do not match!");
			return false
		}
	}
	</script>

	<form name="registerform" onsubmit="return validatePassword()" action="/user" method="POST" class="card">

		<h2>Join Friender!</h2>

		<input type="text" placeholder="Enter First Name" name="first_name" required>

		<input type="text" placeholder="Enter Last Name" name="last_name" required>

		<input type="date" placeholder="Enter Date of Birth" name="date_of_birth" max="2018-02-01" required>

		<input type="email" placeholder="Enter Email" name="email" required>

		<input id="password" type="password" placeholder="Enter Password" name="password" required>

		<input id="password-confirm" type="password" placeholder="Confirm Password" required>

		<input type="checkbox" checked="checked"> Remember me

		<br><br>

		<button class="btn">Make Friends!</button>

	</form>
</div>

<? include 'template/tail.php' ?>