
<? require 'template/head.php' ?>

<div class="container">

	<img class="logomain" src="../../res/img/main.png" alt="Logo">

	<div class="grid">

		<h2 style="grid-area: 1 / 1 / 1 / 3;">
			<? echo $message ?? "Welcome!" ?>
		</h2>

		<button class="button">
			<a href="/signup" class="button__inner">Sign up</a>
		</button>

		<button class="button button--secondary">
			<a href="/login" class="button__inner">Sign in</a>
		</button>

	</div>

	<br>

	<div class="card">

		<div class="card-header">
			All routes
		</div>

		<div class="card-content">
			<? if(isset($routes) && !empty($routes)): ?>
			<ol>
			<? foreach (array_reverse($routes) as $route => $action) { ?>
				<li><a href="<? echo "/$route" ?>"><? echo "/$route" ?></a></li>
			<? } ?>
			</ol>
			<? endif; ?>
		</div>
	</div>

</div>


<? require 'template/tail.php' ?>
