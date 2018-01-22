
<? require 'template/head.php' ?>

<div class="container">

	<img class="logomain" src="../../res/img/main.png" alt="Logo">

	<div class="grid">
		<h2 class="full">
			<? echo $message ?? "Welcome!" ?>
		</h2>

		<button class="half right button">
			<a href="/signup" class="button__inner">Sign up</a>
		</button>

		<button class="half left button button--secondary">
			<a href="/login" class="button__inner">Sign in</a>
		</button>
	</div>

</div>


<? require 'template/tail.php' ?>
