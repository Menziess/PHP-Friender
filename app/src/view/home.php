
<? require 'template/head.php' ?>

<div class="eenderde center">
	<? require 'static/caroussel.php' ?>
</div>

<div class="tweederde grid">
	<img class="logomain full" src="../../res/img/main.png" alt="Logo">


	<? if (!isset($_SESSION['first_name'])): ?>
	<h2 class="full">Vind je ideale vriendengroep!</h2>
	<div class="full grid middle overflow">
		<div class="half center">
			<form action="/signup" method="GET">
				<button type="submit" class="button button--secondary">
					<span class="button__inner"><u>Sign up</u></span>
				</button>
			</form>
		</div>
		<div class="half center">
			<form action="/login" method="GET">
				<button type="submit" class="button">
					<span class="button__inner"><u>Sign in</u></span>
				</button>
			</form>
		</div>
	</div>

	<? else: ?>
	<h2 class="full">Hey <? echo $_SESSION['first_name'] ?>! Zet je email notificaties aan om zo snel mogelijk te weten wanneer er een event voor jou wordt aangemaakt.</h2>
	<div class="full center middle overflow">
		<form action="/settings" method="GET">
			<button type="submit" class="button button--secondary">
				<span class="button__inner"><u>Settings</u></span>
			</button>
		</form>
	</div>

	<? endif; ?>

</div>

<? require 'template/tail.php' ?>
