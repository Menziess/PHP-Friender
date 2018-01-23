
<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">

		<form class="card middle full" name="form" action="/user" method="POST">

			<h2>Maak een account aan</h2>

			<span class="error">
				<? echo $error ?? "" ?>
			</span>

			<input name="first_name" type="text"
				placeholder="Voornaam"
				required>

			<input name="last_name" type="text"
				placeholder="Achternaam"
				required>

			<input name="date_of_birth" type="date"
				placeholder="Geboorte datum"  max="2018-02-01"
				value="<? echo date("Y-m-d", strtotime("- 20 year")) ?>"
				required>

			<input name="email" type="email"
				placeholder="Email"
				required>

			<input id="password" name="password" type="password"
				placeholder="Wachtwoord"
				required>

			<input id="password_confirm" name="password_confirm"
				type="password"
				placeholder="Herhaal wachtwoord"
				required>

			<br>

			<input name="rememberme" type="checkbox"
				checked="checked"> Remember me

			<br>

			<p>
				By creating an account you agree to our <a href="/privacy">Terms & Privacy</a>.
			</p>

			<input type="submit" value="Submit">

		</form>

	</div>
</div>

<? include 'template/tail.php' ?>

