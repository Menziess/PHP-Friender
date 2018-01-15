<html>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "friender";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

$first_name = $_POST[first_name];
$last_name = $_POST[last_name];
$birth_day = $_POST[birth_day];
$email = $_POST[email];
$pwd = $_POST[pwd];
$pwd_confirm = $_POST[pwd_confirm];

$sql = "INSERT INTO `user` (`first_name`, `last_name`, `date_of_birth`, `email`, `password`, `password_check`) VALUES ('$first_name', '$last_name', '$birth_day', '$email', '$pwd', '$pwd_confirm')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


</body>
</html>
