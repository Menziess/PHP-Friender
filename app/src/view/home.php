
<? require 'template/head.php' ?>

<div class="container">

	<!-- logo -->
	<span class="logo"><span style="color: var(--primary)"><u>F</u>R<u>I</u>E<u>ND</span>ER</u></span>

	<!-- example variable received from view -->
	<? echo $variable ?? "no variable set" ?>

	<!-- random JS lol button -->
	<button class="btn">Lol</button>

</div>

<? require 'template/tail.php' ?>
