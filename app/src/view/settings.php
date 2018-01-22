<? include 'template/head.php' ?>

<div class="container">

	<form class="card fixed" action="/settings" method="POST" enctype="multipart/form-data">

		<h2> SETTINGS: </h2>

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
			<!-- Profile picture -->
			<div style="grid-area: span 1 / span 3" class="center right">
				<? if (isset($picture)): ?>
					<img src="/../../uploads/<? echo $picture->filename ?>"
						class="profile-pic" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						class="profile-pic" alt="Nog geen foto">
				<? endif; ?>
			</div>

			<div style="grid-area: span 1 / span 9" class="middle">
				<input type="file" name="image"
					accept="image/x-png,image/jpeg,image/jpg">
				<div style="">
					<input style="width:60%" type="submit">
				</div>
			</div>

			<!-- settings form -->
			<form>
				<div class="center quarter right">
					<label for="first_name">Naam</label>
				</div>
				<div class="half left">
					<input type="text"  id="first_name" value="NAAM">
				</div>
				<br>
				<div class="center quarter right">
					<label for="bio">Biografie</label>
				</div>
				<div class="half left">
					<input type="text"  id="bio" value="BIO">
				</div>
				<br>
				<div class="center quarter right">
					<label for="email">Email</label>
				</div>
				<div class="half left">
					<input type="email"  id="email" value="EMAIL">
				</div>
				<br>
				<div class="center quarter right">
					<label for="prive">Privé account</label>
				</div>
				<div>
					<input type="checkbox"  id="prive" value="on" checked="checked">
				</div>
				<div class="half left">
					<label for="prive">Als je een privé account hebt kan alleen jij de inhoud van je profiel zien.</label>
				</div>
			</form>
		</div>
	</form>
</div>

<? include 'template/tail.php' ?>
