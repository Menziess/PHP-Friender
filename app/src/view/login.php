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
</form>

<a class="full middle center" href="/signup">Sign up</a>

<? include 'template/tail.php' ?>
