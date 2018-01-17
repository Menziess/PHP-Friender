
<? require 'template/head.php' ?>

<div class="container">

	<!-- logo -->
	<img class="logomain" src="../../res/img/main.png" alt="Logo">

	<div class="card">

		<!-- example variable received from view -->
		<div class="card-header">
			<? echo $message ?? "no variable set" ?>
		</div>

		<!-- random JS lol button -->
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
