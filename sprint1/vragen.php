<html>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql="INSERT INTO user ('First name', 'Last name', 'date of birth', 'email', 'password', 'password check')

VALUES ('$_POST[fname]','$_POST[lname]')";

if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}
echo "1 record added";
mysql_close($con)

?>

</body>
</html>



INSERT INTO 'user'('first name', 'last name', 'date of birth', 'email', 'password', 'password check')
	VALUES ( uit bestand van jochem )
	WHERE NOT EXISTS(SELECT email FROM user WHERE email = 'email');
