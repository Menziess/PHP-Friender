
<!DOCTYPE html>
<html>

<style>

:root {
	--primary: #1346b3;
	--primary-darker: #1a23a1;
	--primary-lighter: #5f74eb;
	--secondary: #ac221e;
}

.logo {
	margin: auto;
	font-size: 12vw;
	font-family: 'Open Sans', sans-serif;
	letter-spacing: 5px;
	line-height: 2em;
	display: block;
}

body {
	margin: 0;
	width: 100%;
	font-family: 'Open Sans', sans-serif;
	font-weight: normal;
}

.container {
	display: grid;
	grid-template-columns: 1fr;
	grid-auto-rows: minmax(5em, auto);
	margin: 1em 4em;
	grid-gap: 0.5em;
}

.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.card-content {
    padding: 2px 16px;
}

.nav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}
.nav-item {
    float: left;
}
.nav-item a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
.nav-item a:hover:not(.active) { background-color: #ddd; }
.nav-item a.active {
    color: white;
    background-color: var(--primary);
}

.btn {
	transition: 0.3s;
	margin: auto;
	height: 3em;
	line-height: 22px;
	outline: 0 !important;
	padding: 0 24px;
	border-radius: 4px;
	border: none;
	color: #fff !important;
	background-color: var(--primary);
	background-image: linear-gradient(to left top,rgba(205, 142, 202, 0) 0, var(--primary) 100%);
	text-decoration: none;
	box-shadow: 0 2px 5px 0 rgba(129, 17, 17, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
	text-transform: uppercase;
}
.btn:hover { background-color: var(--primary-lighter); }
.btn:active {
	background-color: var(--primary-darker);
	transform: scale(2);
}

ol {
	list-style-type: none;
	transform: translateX(-1.3em);
}

h1 { font-weight: normal; }

</style>

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
		<span class="logo"><span style="color: var(--primary)"><u>F</u>R<u>I</u>E<u>ND</span><span style="color: var(--secondary)"><u>E<u>R</span></u></span>

		<!-- list Mysql Users -->
		<ol style="text-align: center">
			<?php

			include_once 'getMysqlUsers.php';

			$path = ".env";
			$env = readEnv($path);
			$conn = connect($env);
			getUsernames($conn);

			?>
		</ol>

		<!-- random JS lol button -->
		<li class="btn"><a href="/Webtechnieken-Voor-KI/sprint1/jochem.html"> Sign up </a></li>
	</div>

</body>

</html>
