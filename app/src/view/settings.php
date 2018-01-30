<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">


		<? include 'template/errors&messages.php' ?>

		<style>
			.background {
				position: relative;
			}
			.background:after {
				content:'';
				background: url(/../../uploads/<? echo $picture->filename ?>);
				background-position: center center;
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
		<form class="background half grid card" action="/settings" method="POST"
			enctype="multipart/form-data">

			<h2 class="full">Foto</h2>

			<div class="full center middle">
				<? if (isset($picture)): ?>
					<img src="/../../uploads/<? echo $picture->filename ?>"
						width="200" height="200"
						class="profile-pic-settings" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						width="200" height="200"
						class="profile-pic-settings" alt="Nog geen foto">
				<? endif; ?>
			</div>

			<div class="full middle">
				<input type="file" name="image"
					accept="image/x-png,image/jpeg,image/jpg">
			</div>

			<div class="full down middle">
				<input type="submit" value="upload foto">
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
				<label for="prive">Privé account</label>
			</div>
			<div class="threequarter left">
				<label>
					<? if ($user->is_active == 0): ?>
					<input type="checkbox" name="is_active">
					Andere gebruikers kunnen jouw profiel bekijken.
					<? else: ?>
					<input type="checkbox" name="is_active" checked="checked">
					Andere gebruikers kunnen jouw profiel niet bekijken tenzij ze met jou in een event zitten.
					<? endif; ?>
					<br>
				</label>
			</div>
			<div class="center quarter right">
				<label for="prive">E-mail notificaties</label>
			</div>
			<div class="threequarter left">
				<label>
					<? if ($user->notifications == 0): ?>
					<input type="checkbox" name="notifications">
					Je ontvangt geen notificaties over events.
					<? else: ?>
					<input type="checkbox" name="notifications" checked="checked">
					Je ontvangt notificaties over events op
						<? echo $user->email ?>.
					<? endif; ?>
					<br>
				</label>
			</div>
			<div class="full down middle">
				<input type="submit" value="werk profiel bij">
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
			<div class="full down middle">
				<input type="submit" value="werk wachtwoord bij">
			</div>
		</form>

		<form class="half grid card" action="/settings" method="POST"
			enctype="multipart/form-data">

			<h2 class="full">Biografie</h2>

			<div class="center quarter right">
				<label for="bio">Biografie</label>
			</div>
			<div class="threequarter left">
				<textarea style="overflow-y:auto" rows="12" cols="76" name="bio"><? echo $user->bio ?></textarea>
			</div>

			<div class="full down middle">
				<input type="submit" value="werk biografie bij">
			</div>
		</form>

		<div class="full center">
			<a class="event_button" href="/event" type="button">Naar je event pagina!</a>
		</div>
	</div>
</div>

<? include 'template/tail.php' ?>
