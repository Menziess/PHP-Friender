<? include 'template/head.php' ?>

<div class="container">
	<h5> Current profile picture: </h5>
	<?
	echo '<img src="/../../uploads/' . $picture->filename . '" alt="">';
	?>

	<form action="/user/settings" method="POST" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit">
	</form>
</div>

<? include 'template/tail.php' ?>
