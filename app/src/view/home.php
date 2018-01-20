
<? require 'template/head.php' ?>

<div class="container">

	<img class="logomain" src="../../res/img/main.png" alt="Logo">

	<div class="card">

		<div class="card-header">
			<? echo $message ?? "" ?>
		</div>

		<button class="button">
			<a href="/signup" class="button__inner">Sign up</a>
		</button>

		<button class="button button--secondary">
			<a href="/login" class="button__inner">Sign in</a>
		</button>

	</div>

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
