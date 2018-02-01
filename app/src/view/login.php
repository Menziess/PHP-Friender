<? include 'template/head.php' ?>

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
	<br>
	<br>
	<div class="center">
		Of maak nu snel een account
		<br>
		als je er nog geen hebt!
		<a href="/signup" class=" full middle">
			<input type="button" value="Sign up">
		</a>
	</div>

</a>
</form>

<? include 'template/tail.php' ?>
