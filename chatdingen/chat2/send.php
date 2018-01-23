<?php
mysql_connect('host', 'username', 'password') or die (mysql_error());
mysql_select_db('database') or die (mysql_error());
$username = mysql_fetch_array(mysql_query("SELECT username FROM chatusers WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "'"));
$username = $username['username'];
mysql_query("INSERT INTO messages VALUES('" . $username . "','" . $_GET['to'] . "', '" . $_GET['mes'] . "', " . time() . ")") or die(mysql_error());
?>
