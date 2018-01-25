
<? require 'template/head.php' ?>

<div class="container" >

	<img class="logomain" src="../../res/img/main.png" alt="Logo">

	<div class="grid overflow" >

		<h2 class="full">Vind je ideale vriendengroep!</h2>

		<div class="halfmiddle">
		<button class="half button"
			onclick="navigate('/login', 300);">
			<a class="button__inner"><u>Sign in</u></a>
		</button>

		<button class="half button button--secondary"
			onclick="navigate('/signup', 300);">
			<a class="button__inner"><u>Sign up</u></a>
		</button>
		</div>

	</div>
</div>

<? require 'template/tail.php' ?>
