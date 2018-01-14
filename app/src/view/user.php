<!DOCTYPE html>
<html lang="en">

<? require 'template/head.php' ?>

<body>

	<? require 'template/nav.php' ?>

	<h1>
	<? echo
		empty($users) ?
			'Welcome...' :
			"Hello, " . $users[0]['first_name']
	. "." ?>
	</h1>

	<br>

	<pre>
		<?
		if (empty($users))
			echo 'No users in database...';
		else
			foreach ($users[0] as $key => $value) {
				echo '<br>' . $key . ' => ' . $value;
			}
		?>
	</pre>

</body>
</html>