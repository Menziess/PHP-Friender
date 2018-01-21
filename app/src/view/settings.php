<? include 'template/head.php' ?>

<div class="container">

	<form class="card" action="/settings" method="POST" enctype="multipart/form-data">

		<h2> Current profile picture: </h2>

		<? if (isset($errors)): ?>
			<ul>
				<? foreach ($errors as $error) { ?>
					<span class="error">
						<? echo $error  ?>
					</span>
				<? } ?>
			</ul>
		<? endif; ?>

		<!-- Profile picture -->
		<div class="center">
			<? if (isset($picture)): ?>
				<img src="/../../uploads/<? echo $picture->filename ?>"
					class="profile-pic" alt="Profile picture">
			<? else: ?>
				<img src="/../../res/img/placeholder.jpg"
					class="profile-pic" alt="Nog geen foto">
			<? endif; ?>
		</div>

		<input type="file" name="image">
		<input type="submit">
	</form>
</div>

<? include 'template/tail.php' ?>
