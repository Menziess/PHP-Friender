
<? include 'template/head.php' ?>

<div class="container" style="display:block">
	<div class="form-style-8">
		<h2>Maak een account aan</h2>

		<p style="background: red;">
			<? echo $error ?? "" ?>
		</p>

		<form name="form" action="/user" method="POST">

			<input name="first_name" type="text"
				placeholder="Voornaam"
				required>

			<input name="last_name" type="text"
				placeholder="Achternaam"
				required>

			<input name="date_of_birth" type="date"
				placeholder="Geboorte datum"  max="2018-02-01"
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

			<input name="remember_me" type="checkbox"
				checked="checked"> Remember me

			<p>
				By creating an account you agree to our <a href="/privacy">Terms & Privacy</a>.
			</p>

<!--
			De button moet een <input> element worden:
-->
			<input type="submit" value="Submit">

			<!-- <button class="button button--secondary">
					<span class="button__inner"> Lets make friends!  </span>
			</button> -->

		</form>
	</div>
</div>

<? include 'template/tail.php' ?>

