<? include 'template/head.php' ?>

<div class="full middle">
	<form class="card full middle" action="/login" method="POST">

		<h2>Log in</h2>

		<input type="email" placeholder="Uw email" name="email"
		value="<? echo $email ?? "" ?>" required>
		<input type="password" placeholder="Uw wachtwoord" name="password" required>

		<br>

		<input name="rememberme" type="checkbox"
			checked="checked"> Onthoud mijn gegevens
		<br>
		<br>
		<div>
			<input type="submit" value="Log in">
		</div>
	</form>
	<br>

	<div class="card full middle">
		<div class=" center">
			Of maak nu snel een account
			<br>
			als je er nog geen hebt!
			<br>
			<br>
			<a href="/signup">
				<input type="button" value="Sign up">
			</a>
		</div>
	</div>
</div>

<? include 'template/tail.php' ?>
