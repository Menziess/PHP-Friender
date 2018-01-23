<?
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'your password';

$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ('Error connecting to mysql');

$dbname = 'chat_database';

mysql_select_db($dbname);

$message = $_POST['message'];

if($message != "")
{
 $sql = "INSERT INTO `chat` VALUES('','$message')";
 mysql_query($sql);
}

$sql = "SELECT `Text` FROM `chat` ORDER BY `Id` DESC";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
 echo $row['Text']."\n";


?>
