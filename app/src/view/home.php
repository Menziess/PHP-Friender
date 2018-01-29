
<? require 'template/head.php' ?>

<div class="container" >
	<div class="grid overflow" >

		<div class="eenderde center">
			<? require 'static/caroussel.php' ?>
		</div>

		<div class="tweederde grid">
			<img class="logomain full" src="../../res/img/main.png" alt="Logo">


			<? if (!isset($_SESSION['first_name'])): ?>
			<h2 class="full">Vind je ideale vriendengroep!</h2>
			<div class="full grid middle overflow">
				<div class="half center">
					<button class="button button--secondary"
						onclick="navigate('/signup', 300);">
						<span class="button__inner"><u>Sign up</u></span>
					</button>
				</div>
				<div class="half center">
					<button class="button"
						onclick="navigate('/login', 300);">
						<span class="button__inner"><u>Sign in</u></span>
					</button>
				</div>
			</div>

			<? else: ?>
			<h2 class="full">Hey <? echo $_SESSION['first_name'] ?>! Zet je email notificaties aan om zo snel mogelijk te weten wanneer er een event voor jou wordt aangemaakt.</h2>
			<div class="full center middle overflow">
				<button class="button button--secondary"
					onclick="navigate('/event', 300);">
					<span class="button__inner"><u>Eventpagina</u></span>
				</button>
			</div>

			<? endif; ?>

		</div>
	</div>
</div>

<? require 'template/tail.php' ?>
