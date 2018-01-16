
<? require 'template/head.php' ?>

<div class="container">

	<!-- logo -->
	<span class="logo"><span style="color: var(--primary)"><u>F</u>R<u>I</u>E<u>ND</span>ER</u></span>

	<div class="card">

		<!-- example variable received from view -->
		<div class="card-header">
			<? echo $variable ?? "no variable set" ?>
		</div>

		<!-- random JS lol button -->
		<a href="/signup" class="btn">Signup</a>
	</div>

</div>

<? require 'template/tail.php' ?>
