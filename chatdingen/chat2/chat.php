<html>
<head>
<style>
#chat {
width:500px;
margin:0 auto;
}
#login {
width:230px;
height:50px;
margin:100px;
border:1px solid black;
text-indent:10px;
}
.onlineuser {
padding:0 10px;
background:#CCC;
margin-left:2px;
}
.yes {
background:#F90;
}
.message {
float:left;
border:1px solid black;
width:498px;
}
.messdate {
float:right;
}
.selected {
background:red;
}
</style>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<body>
<div id="chat"><div id="messages"></div>

<?php mysql_connect('host', 'username', 'password') or die (mysql_error());
mysql_select_db('database') or die (mysql_error());
if(mysql_num_rows(mysql_query("SELECT username FROM chatusers WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "'")) == 0){ ?>
<div id="login">
Select username: <br />
<input type="text" id="usernameinput"/>
<input type="button" value="Login" id="loginbutton"/>
</div>
<?php }

else {
mysql_query("UPDATE chatusers SET lastactive = " . time() . " WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "'");
?>
<div id="onlineusers">
</div>
<div id="send">
<textarea id="message" cols="50" rows="5"></textarea><br/><input type="button" value="Send" id="sendbutton" disabled="disabled"/>
</div>
<?php } ?>

<script>
$('#loginbutton').click(function (){
if($(this).attr("disabled") != "disabled"){
var error = $.ajax({
url: "login.php",
data: "username=" + $('#usernameinput').val(),
async:false
}).responseText;
if(error != ''){
alert(error);
}
else {
location.reload();
}
}
});

var from = '';
showusers();
function showusers(){
$('#onlineusers').html($.ajax({
url: 'onlineusers.php?x=' + Math.random() + '&selected=' + from,
async:false
}).responseText);
$('#messages').html($.ajax({
url: 'show-messages.php',
data: '?x=' + Math.random() + '&from=' + from,
async:false
}).responseText);
setTimeout('showusers()',15000);
}

$('.onlineuser').click(function (){
from = $(this).html();
$('#messages').html($.ajax({
url: 'show-messages.php',
data: '?x=' + Math.random() + '&from=' + $(this).html(),
async:false
}).responseText);
$('#sendbutton').removeAttr("disabled");
showusers();
});

$('#sendbutton').click(function (){
if($(this).attr("disabled") != "disabled"){
var message = $('#message').val();
$.ajax({
url: 'send.php?to=' + from + '&mes=' + message
});
$('#message').val('');
showusers();
}
});
</script>
</body>
</html>
