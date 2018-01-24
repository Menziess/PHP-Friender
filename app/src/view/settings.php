<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">


		<? include 'template/errors&messages.php' ?>

		<!-- Om te testen -->
		<style>
			.background {
				position: relative;
			}
			.background:after {
				content:'';
				background: url(/../../uploads/<? echo $picture->filename ?>);
				background-size: cover;
				position: absolute;
				top:0px;
				left: 0px;
				width:100%;
				height:100%;
				z-index: -1;
				opacity: 0.1;
			}
			.background.card {
				background-color: transparent;
			}
		</style>

		<!-- Heeft background class -->
		<form class="background full grid card" action="/settings" method="POST"
			enctype="multipart/form-data">

			<h2 class="full">Foto</h2>

			<div class="full center middle">
				<? if (isset($picture)): ?>
					<img src="/../../uploads/<? echo $picture->filename ?>"
						width="200px" height="200px"
						class="profile-pic" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						width="200px" height="200px"
						class="profile-pic" alt="Nog geen foto">
				<? endif; ?>
			</div>

			<div class="full middle">
				<input type="file" name="image"
					accept="image/x-png,image/jpeg,image/jpg">
			</div>

			<div class="full middle">
				<input type="submit">
			</div>
		</form>

		<form class="half grid card" action="/settings" method="POST"
			enctype="multipart/form-data">

			<h2 class="full">Profiel</h2>

			<div class="center quarter right">
				<label for="first_name">Naam</label>
			</div>
			<div class="threequarter left">
				<input type="text" name="first_name"
					value="<? echo $user->first_name ?>">
			</div>
			<div class="center quarter right">
				<label for="bio">Biografie</label>
			</div>
			<div class="threequarter left">
				<input type="text"  name="bio"
					value="<? echo $user->bio ?>"
					placeholder="Vul hier iets in over jezelf">
			</div>
			<div class="center quarter right">
				<label for="prive">Privé account</label>
			</div>
			<div class="threequarter left">
				<label>
					<? if ($user->is_active == 1): ?>
					<input type="checkbox" name="is_active" checked="checked">
					Als je een privé account hebt kan alleen jij de inhoud van
					je profiel zien.
					<b>Momenteel zichtbaar</b>
					<? else: ?>
					<input type="checkbox" name="is_active">
					Als je een privé account hebt kan alleen jij de inhoud van
					je profiel zien.
					<b>Momenteel niet zichtbaar</b>
					<? endif; ?>
					<br>
				</label>
			</div>
			<div class="full middle">
				<input type="submit">
			</div>
		</form>

		<form class="half grid card" action="/settings" method="POST" enctype="multipart/form-data">

			<h2 class="full">Wachtwoord</h2>

			<div class="center quarter right">
				<label for="password_old">Huidig</label>
			</div>
			<div class="threequarter left">
				<input type="password" name="password_old"
					placeholder="Huidig wachtwoord"
					required>
			</div>
			<div class="center quarter right">
				<label for="password">Nieuw</label>
			</div>
			<div class="threequarter left">
				<input id="password" type="password" name="password"
					placeholder="Nieuw wachtwoord"
					required>
			</div>
			<div class="center quarter right">
				<label for="password_confirm">Bevestig</label>
			</div>
			<div class="threequarter left">
				<input type="password" name="password_confirm"
					placeholder="Bevestig wachtwoord"
					required>
			</div>
			<div class="full middle">
				<input type="submit">
			</div>
		</form>

	</div>
</div>

<? include 'template/tail.php' ?>
