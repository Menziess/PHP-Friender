
<? require 'template/head.php' ?>

<div class="container">

	<!-- logo -->
	<span class="logo"><span style="color: var(--primary)"><u>F</u>R<u>I</u>E<u>ND</span>ER</u></span>

	<!-- example variable received from view -->
	<? echo $variable ?? "no variable set" ?>

	<!-- random JS lol button -->
	<a href="/signup" class="btn">Signup</a>

</div>

<? require 'template/tail.php' ?>
