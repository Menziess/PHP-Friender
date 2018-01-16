<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>probeersel</title>

	<link rel="stylesheet" href="stylereal.css">
	<link rel="stylesheet" href="achtergrond.css">
</head>

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
	<div class="footer">
		<ul class="foot">
				<li class="foot-item"><a href="#contact">Contact</a></li>
				<li class="foot-item"><a href="/Applications/AMPPS/www/Webtechnieken-Voor-KI/sprint2/design/privacy.html">Privacy</a></li>
				<li class="foot-item"><a href="#overons">Over ons</a></li>
		</ul>
	</div>
</body>

<script>
		function validatePassword() {

			var pwd = document.getElementsByName("pwd")[0].value;
			var pwd_confirm = document.getElementsByName("pwd-confirm")[0].value;

			if (pwd != pwd_confirm) {
				alert("Passwords Do not match!");
				return false
			}
		}
</script>

</html>
