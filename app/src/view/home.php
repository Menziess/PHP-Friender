
<? require 'template/head.php' ?>

<div class="container">

	<img class="logomain" src="../../res/img/main.png" alt="Logo">

	<div class="card">

		<div class="card-header">
			<? echo $message ?? "no variable set" ?>
		</div>

		<body1>
			<button class="button">
				<a href="/signup" class="button__inner">SIGN UP</a>
			</button>

			<button class="button button--secondary">
				<a href="/login" class="button__inner">SIGN IN</a>
			</button>
		</body1>
	</div>

</div>


<? require 'template/tail.php' ?>
