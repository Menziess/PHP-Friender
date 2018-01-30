<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">

		<form class="card full middle" action="/login" method="POST">

			<h2>Log in</h2>

			<span class="error">
				<? echo $error ?? "" ?>
			</span>

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

	</div>
</div>

<? include 'template/tail.php' ?>
