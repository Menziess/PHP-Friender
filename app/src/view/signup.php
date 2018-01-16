
<? include 'template/head.php' ?>

<div class="container">
	<div>
		<div class="form-style-8">
			<h2>Maak een account aan</h2>
			<form>
				<input type="text" name="field1" placeholder="Voornaam" />

				<input type="text" name="field1" placeholder="Achternaam" />

				<input type="date" name="field1" placeholder="Geboorte datum" max="2018-02-01" />

				<input type="email" name="field2" placeholder="Email" />

				<input type="password" name="field3" placeholder="Wachtwoord" name="pwd" />

				<input type="password" name="field3" placeholder="Controle wachtwoord"  name="pwd_confirm" />

				<input type="checkbox" checked="checked"> Remember me

				<p>By creating an account you agree to our <a href="/Webtechnieken-Voor-KI/sprint2/design/privacy.html">Terms & Privacy</a>.</p>

				<button class="button button--secondary">
						<span class="button__inner"> Lets make friends!  </span>
				</button>

			</form>
		</div>
	</div>
</div>

<? include 'template/tail.php' ?>

