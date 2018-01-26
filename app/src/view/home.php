
<? require 'template/head.php' ?>

<div class="container" >
	<div class="grid overflow" >

		<div class="eenderde center">
			<? require 'static/caroussel.php' ?>
		</div>

		<div class="tweederde grid">
			<img class="logomain full" src="../../res/img/main.png" alt="Logo">

			<h2 class="full">Vind je ideale vriendengroep!</h2>

			<div class="full grid middle">

				<button class="half button button--secondary"
					onclick="navigate('/signup', 300);">
					<a class="button__inner"><u>Sign up</u></a>
				</button>
				<button class="half button"
					onclick="navigate('/login', 300);">
					<a class="button__inner"><u>Sign in</u></a>
				</button>

			</div>
		</div>

	</div>
</div>

<? require 'template/tail.php' ?>
