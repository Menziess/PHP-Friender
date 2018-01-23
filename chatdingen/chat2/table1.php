<?php
mysql_connect("host", "username", "password") or die(mysql_error());
mysql_select_db("database") or die(mysql_error());
mysql_query("CREATE TABLE chatusers(
username VARCHAR(30),
ip CHAR(15),
lastactive INT UNSIGNED,
PRIMARY KEY(username)
)")
or die(mysql_error());
echo "Table Created!";
?>
