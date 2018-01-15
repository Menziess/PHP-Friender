<<<<<<< HEAD
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

$sql="INSERT INTO user ('first name', 'last name', 'date of birth', 'email', 'password', 'password check')

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
=======
<?php

print $_POST["werken"]

?>
>>>>>>> f41f5a7db57119cf360cee6846766727fd848629
