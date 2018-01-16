
<? require 'template/head.php' ?>

<h1>
<? echo empty($user) ? 'Welcome...' : "Hi, " . $user['first_name'] . "." ?>
</h1>

<br>

<pre>
<? # A user by id
if (!empty($user))
	echo print_r($user);
else if (isset($id))
	echo "User with id: $id not found...<br>";
?>

<? # Collection of users
if (!empty($users))
	foreach ($users as $user) {
		echo '<br>';
		print_r($user);
	}
?>
</pre>

<? require 'template/tail.php' ?>
