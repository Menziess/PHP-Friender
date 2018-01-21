
<? require 'template/head.php' ?>

<div class="container">

	<img class="logomain" src="../../res/img/main.png" alt="Logo">

	<div class="grid">
		<h2 class="template-default">
			<? echo $message ?? "Welcome!" ?>
		</h2>

		<button class="button">
			<a href="/signup" class="button__inner">Sign up</a>
		</button>

		<button class="button button--secondary">
			<a href="/login" class="button__inner">Sign in</a>
		</button>
	</div>

</div>


<? require 'template/tail.php' ?>
