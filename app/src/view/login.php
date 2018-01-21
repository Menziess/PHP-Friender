<? include 'template/head.php' ?>

<div class="container">
	<form class="card" action="/login" method="POST">

		<h2>Log in</h2>

		<span class="error">
			<? echo $error ?? "" ?>
		</span>

		<input type="email" placeholder="Enter Email" name="email"
		value="<? echo $email ?? "" ?>" required>
		<input type="password" placeholder="Enter Password" name="password" required>

		<br>

		<input name="rememberme" type="checkbox"
			checked="checked"> Remember me

		<br>

		<input type="submit" value="Submit">

	</form>
</div>

<? include 'template/tail.php' ?>
