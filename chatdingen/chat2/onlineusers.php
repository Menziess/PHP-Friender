<?php
mysql_connect('host', 'username', 'password') or die (mysql_error());
mysql_select_db('database') or die (mysql_error());
mysql_query("UPDATE chatusers SET lastactive = " . time() . " WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "'");
$users = mysql_query("SELECT username FROM chatusers WHERE ip != '" . $_SERVER['REMOTE_ADDR'] . "'");
mysql_query("DELETE FROM chatusers WHERE lastactive < " . (time() - 600)) or die(mysql_error());
echo 'Online users: ';
$username = mysql_fetch_array(mysql_query("SELECT username FROM chatusers WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "'"));
$username = $username['username'];
while($row = mysql_fetch_array($users)){
$class = '';
$class2 = '';
if(mysql_num_rows(mysql_query("SELECT * FROM messages WHERE sendto = '" . $username . "' and messagefrom = '" . $row['username'] . "'")) > 0) {
$class = 'yes';
}
if($_GET['selected'] == $row['username']){
$class2 = 'selected';
}
echo '<span class="onlineuser ' . $class . ' ' . $class2 . '">' . $row['username'] . '</span>';
}
?>
