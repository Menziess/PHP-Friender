
<? require 'template/head.php' ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h1>
				<? echo empty($user) ? 'Welcome...' : "Hi, " . $user['first_name'] . "." ?>
			</h1>
		</div>

		<div class="card-content">
			<pre>
				<? # A user by id
				if (!empty($user))
				echo print_r($user);
				else if (isset($id))
				echo "User with id: $id not found...<br>";
				?>
			</pre>
		</div>
	</div>

	<? # Collection of users
	if (!empty($users))
	foreach ($users as $user) {
		echo '<div class="card">';
		echo '<pre class="card-content">';
		print_r($user);
		echo '</pre>';
		echo '</div>';
	}
	?>
</div>

<? require 'template/tail.php' ?>
