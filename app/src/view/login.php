<? include 'template/head.php' ?>

<div class="container">
	<div class="form-style-8">
		<form>
			<input type="text" placeholder="Enter Username" name="uname" required>
			<input type="password" placeholder="Enter Password" name="psw" required>
			Remember me: <input type="checkbox" name="rememberme" value="1"><br>
		</form>

<!--
		ZO MOET DE BUTTON WORDEN:
-->
		<!-- <input type="submit"> -->

		<button class="button button--secondary">
				<span class="button__inner"> SIGN IN!  </span>
		</button>

	</div>
</div>

<?php
/* valid username en password */
$user = 'user';
$pass = 'pass';

if (isset($_POST['uname']) && isset($_POST['psw'])) {
	if (($_POST['uname'] == $user) && ($_POST['psw'] == $pass)) {
		if (isset($_POST['rememberme'])) {
			/* cookie bestaat 1 jaar bruikbaar op hele site*/
			setcookie('username', $_POST['uname'], time()+60*60*24*365, '/');
			setcookie('password', $_POST['psw'], time()+60*60*24*365, '/');
		} else {
			/* Cookie verloopt wanneer browser sluit */
			setcookie('username', $_POST['uname'], false, '/');
			setcookie('password', $_POST['psw'], false, '/');
		}
		header('Location: login.php');
	} else {
		echo 'Username/Password Invalid';
	}
} else {
	echo 'You must supply a username and password.';
}
?>


<? include 'template/tail.php' ?>
