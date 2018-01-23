<?php
mysql_connect('host', 'username', 'password') or die (mysql_error());
mysql_select_db('database') or die (mysql_error());
$username = mysql_fetch_array(mysql_query("SELECT username FROM chatusers WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "'"));
$username = $username['username'];
mysql_query("DELETE FROM messages WHERE date < " . (time() - 1800));
$result = mysql_query("(SELECT * FROM messages WHERE messagefrom = '" . $_GET['from'] . "' and sendto = '" . $username . "' ORDER BY date ASC LIMIT 0, 10) UNION (SELECT * FROM messages WHERE messagefrom = '" . $username . "' and sendto = '" . $_GET['from'] . "' ORDER BY date ASC LIMIT 0, 10)") or die(mysql_error());
while($row = mysql_fetch_array($result)){
if($row['messagefrom'] == $username){
$by = 'You';
}
else{
$by = $_GET['from'];
}
echo '<div class="message"><b>' . $by . ':</b> ' . $row['message'] . '<span class="messdate">' . date('g:i A M, d Y',$row['date']) . '</span></div>';
}
?>
