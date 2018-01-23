<?php
mysql_connect("host", "username", "password") or die(mysql_error());
mysql_select_db("database") or die(mysql_error());
mysql_query("CREATE TABLE messages(
messagefrom VARCHAR(30),
sendto VARCHAR(30),
message VARCHAR(255),
date INT UNSIGNED
)")
or die(mysql_error());
echo "Table Created!";
?>
