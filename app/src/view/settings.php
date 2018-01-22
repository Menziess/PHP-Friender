<? include 'template/head.php' ?>

<div class="container">

	<? if (isset($picture)): ?>
	<form class="card fixed" action="/settings" method="POST"
		enctype="multipart/form-data">

		<h2> Foto: </h2>

		<? if (isset($errors)): ?>
			<ul>
				<? foreach ($errors as $error) { ?>
					<span class="error">
						<? echo $error  ?>
					</span>
				<? } ?>
			</ul>
		<? endif; ?>

		<div class="grid">
			<div class="center quarter right">
				<label for="image">Foto</label>
			</div>
			<div class="half middle">
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
		</div>
	</form>
	<? else: ?>
	Picture not found!
	<? endif; ?>

	<? if (isset($user)): ?>
	<form class="card fixed" action="/settings" method="POST"
		enctype="multipart/form-data">

		<h2> Profiel: </h2>

		<div class="grid">
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
					value="<? echo $user->bio ?>">
			</div>
			<div class="center quarter right">
				<label for="prive">Privé account</label>
			</div>
			<div class="threequarter left">
				<label>
					<input type="checkbox" name="is_active"
						<? echo $user->is_active == 1
									? 'checked'
									: ''?>>
					</input>
					Als je een privé account hebt kan alleen jij de inhoud van
					je profiel zien.
				</label>
			</div>
			<div class="full middle">
				<input type="submit">
			</div>
		</div>
	</form>
	<? else: ?>
	User not found!
	<? endif; ?>

</div>

<? include 'template/tail.php' ?>
