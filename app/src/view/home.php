
<? require 'template/head.php' ?>

<div class="container" >
	<div class="grid overflow" >

		<div class="quarter">
			<img class="screenshot" src="../../res/img/Screenshot.png" alt="screenshot"
			width="300px" height="600px" >
		</div>

		<div class="threequarter grid">
			<img class="logomain full" src="../../res/img/main.png" alt="Logo">

			<h2 class="full">Vind je ideale vriendengroep!</h2>

			<div class="full middle">
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
</div>

<? require 'template/tail.php' ?>
