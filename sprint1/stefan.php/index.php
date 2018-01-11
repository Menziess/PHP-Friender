<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Stefan.php</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>

<body>

	<!-- navbar -->
	<ul class="nav">
		<li class="nav-item"><a href="/">Home</a></li>
		<li class="nav-item"><a class="active" href="#">Stefan</a></li>
		<li class="nav-item"><a href="/Webtechnieken-Voor-KI/sprint1/sarah.html">Sarah</a></li>
	</ul>

	<div class="container">

		<!-- logo -->
		<span class="logo"><span style="color: var(--primary)"><u>F</u>R<u>I</u>E<u>ND</span>ER</u></span>

		<!-- list Mysql Users -->
		<ol style="text-align: center">
			<?php

			include_once 'getMysqlUsers.php';

			$path = "env";
			$env = readEnv($path);
			$conn = connect($env);
			getUsernames($conn);

			?>
		</ol>

		<!-- random JS lol button -->
		<button class="btn">Lol</button>

	</div>

</body>

</html>
