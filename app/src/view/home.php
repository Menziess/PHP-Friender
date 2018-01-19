
<? require 'template/head.php' ?>

<div class="container">

	<img class="logomain" src="../../res/img/main.png" alt="Logo">

	<div class="card">

		<div class="card-header">
			<? echo $message ?? "" ?>
		</div>

		<body1>
			<a href="/signup" class="button__inner">
			<button class="button">Sign up</button>
			</a>


			<button class="button button--secondary">
			<a onclick="location.replace("/login")" class="button__inner">Sign in</a>
			</button>


		</body1>
	</div>

</div>


<? require 'template/tail.php' ?>
