<?php
/**
 * Read env file containing passwords etc.
 */
function readEnv($path) {
	$env = file_get_contents($path);
	$json = json_decode($env, true);
	return $json;
}

/**
 * Connect to the database using environmental variables.
 */
function connect($env) {
	$servername = $env['database']["servername"];
	$username = $env['database']["username"];
	$password = $env['database']["password"];

	try {
		$conn = new PDO("mysql:host=$servername;dbname=mysql",
						$username,
						$password);
		# set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<h1>Connected successfully</h1>";
	} catch(PDOException $e) {
		echo "<h2>Connection failed: " . $e->getMessage() . "</h2>";
	}
	return $conn;
}

/**
 * Query and print usernames.
 */
function getUsernames($conn) {
	try {
		$sql = 'SELECT user FROM user ORDER BY user';
	} catch (Exception $e) {
		echo "Query failed: " . $e->getMessage();
	}
	foreach ($conn->query($sql) as $row) {
		echo "<li>" . $row['user'] . "</li>";
	}
}
?>