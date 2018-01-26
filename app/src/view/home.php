
<? require 'template/head.php' ?>

<div class="container" >
	<div class="grid overflow" >

		<div class="eenderde center">
			<? require 'static/caroussel.php' ?>
		</div>

		<div class="tweederde grid">
			<img class="logomain full" src="../../res/img/main.png" alt="Logo">

			<h2 class="full">Vind je ideale vriendengroep!</h2>

			<? if (!isset($_SESSION['first_name'])): ?>
			<div class="full grid middle overflow">
				<div class="half center">
					<button class="button button--secondary"
						onclick="navigate('/signup', 300);">
						<a class="button__inner"><u>Sign up</u></a>
					</button>
				</div>
				<div class="half center">
					<button class="button"
						onclick="navigate('/login', 300);">
						<a class="button__inner"><u>Sign in</u></a>
					</button>
				</div>
			</div>
			<? endif; ?>

		</div>
	</div>
</div>

<? require 'template/tail.php' ?>
