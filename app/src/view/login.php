<? include 'template/head.php' ?>

<div class="container">
	<div class="form-style-8">
		<form>
			<input type="text" placeholder="Enter Username" name="uname" required>
			<input type="password" placeholder="Enter Password" name="psw" required>
			Remember me: <input type="checkbox" name="rememberme" value="1"><br>
		</form>

<<<<<<< HEAD
<body>
<!-- Header -->
	<ul class="header">
		<li class="nav"><a href="#logo">LOGO</a></li>
		<li class="nav" style="float:right"><a href="signup.html">SIGN UP</a></li>
	</ul>
<!-- Container -->


	<div class="container">
		<div class="div_forms">
			<div class="form-style-8">
					<form>
						<input type="text" placeholder="Enter Username" name="uname" required>
						<input type="password" placeholder="Enter Password" name="psw" required>
					</form>
					<button class="button button--secondary">
							<span class="button__inner"> SIGN IN!  </span>
					</button>
			</div>
		</div>
	</div>

<!-- footer -->
	<!-- <div class="footer">
		<ul class="foot">
				<li class="foot-item"><a href="#contact">Contact</a></li>
				<li class="foot-item"><a href="/Applications/AMPPS/www/Webtechnieken-Voor-KI/sprint2/design/privacy.html">Privacy</a></li>
				<li class="foot-item"><a href="#overons">Over ons</a></li>
		</ul>
	</div> -->
	<? include 'template/tail.php' ?>
</body>
=======
<!--
		ZO MOET DE BUTTON WORDEN:
-->
		<!-- <input type="submit"> -->
>>>>>>> 9838952ddeb145f6fb65f1338f3f33b5015515ed

<<<<<<< HEAD
=======
		<button class="button button--secondary">
				<span class="button__inner"> SIGN IN!  </span>
		</button>

	</div>
</div>
>>>>>>> ff8423ece44c84ad972db93de129882b2fc5abd2

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
