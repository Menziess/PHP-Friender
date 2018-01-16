
<? include 'template/head.php' ?>

<div class="container">

	<form name="form" action="/user" method="POST" class="card">

		<h2>Join Friender!</h2>

		<input name="first_name" type="text"
			placeholder="Enter First Name"
			required>

		<input name="last_name" type="text"
			placeholder="Enter Last Name"
			required>

		<input name="date_of_birth" type="date"
			placeholder="Enter Date of Birth"  max="2018-02-01"
			required>

		<input name="email" type="email"
			placeholder="Enter Email"
			required>

		<input id="password" name="password" type="password"
			placeholder="Enter Password"
			required>

		<input id="password_confirm" name="password_confirm" type="password"
			placeholder="Confirm Password"
			required>

		<input name="remember_me" type="checkbox"
			checked="checked"> Remember me

		<br><br>

		<input type="submit" class="btn" value="Make Friends!">

	</form>
</div>

<? include 'template/tail.php' ?>