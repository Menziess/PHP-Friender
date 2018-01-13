<!DOCTYPE html>
<html lang="en">

<? require 'template/head.php' ?>

<body>

	<? require 'template/nav.php' ?>

	<h1><? echo "Hello, " . $users[0]['First name'] . "." ?></h1>

	<br>

	<pre>
		<?
		foreach ($users[0] as $key => $value) {
			echo '<br>' . $key . ' => ' . $value;
		}
		?>
	</pre>

</body>
</html>