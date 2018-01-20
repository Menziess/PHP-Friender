<? include 'template/head.php' ?>

<div class="container">

	<h3> Current profile picture: </h3>

	<? if (isset($picture)): ?>

		<img src="/../../uploads/<? echo $picture->filename ?>"
			class="profile-pic" alt="Profile picture">

	<? else: ?>

		<img src="/../../res/img/noggeenfoto.jpg"
			class="profile-pic" alt="Nog geen foto">

	<? endif; ?>

	<form action="/settings" method="POST" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit">
	</form>
</div>

<? include 'template/tail.php' ?>
