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
	<nav>
		<a class="btn" href="/">Home</a>
	</nav>
	<h1>Database users</h1>

	<ol>
	<?php
		echo "<li>Test</li>";

		use App\Connector;

		$db = new Connector('mariadb:host=localhost;dbname=mysql;charset=utf8mb4', 'root', 'root');

		try {
			//connect as appropriate as above
			$result = mysql_query('SELECT * from user') or die(mysql_error());
		} catch(PDOException $ex) {
			echo $ex->getMessage();
		}

	?>
	</ol>
</body>

</html>
