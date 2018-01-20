<? include 'template/head.php' ?>

<div class="container">

	<h3> Current profile picture: </h3>

	<?
	if(isset($picture)) {
		echo '<img src="/../../uploads/' . $picture->filename . '" alt="" style="border-radius: 100%">';
	} else {
		echo '<img src="/../../res/img/noggeenfoto.jpg" alt="Nog geen foto" style="width:30%; border-radius: 100%">';
	}
	?>

	<form action="/settings" method="POST" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit">
	</form>
</div>

<? include 'template/tail.php' ?>
