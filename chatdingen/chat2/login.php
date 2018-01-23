<?php
mysql_connect('host', 'username', 'password') or die (mysql_error());
mysql_select_db('database') or die (mysql_error());
if(mysql_num_rows(mysql_query("SELECT * FROM chatusers WHERE username = '" . $_GET['username'] . "'")) == 0){
mysql_query("INSERT INTO chatusers VALUES('" . $_GET['username'] . "', '" . $_SERVER['REMOTE_ADDR'] . "', " . time() . ")") or die(mysql_error());
}
else{
echo 'Username is taken';
}
?>
