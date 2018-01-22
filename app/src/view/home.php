
<? require 'template/head.php' ?>

<div class="container">

	<img class="logomain" src="../../res/img/main.png" alt="Logo">

<<<<<<< HEAD
	<div class="card">

		<div class="card-header">
			<? echo $message ?? "" ?>
		</div>

		<body1>
		<button class="button"><a href="/signup" class="button__inner">
		Sign up</a></button>



			<button class="button button--secondary">
				<a href="/login" class="button__inner">Sign in</a>
			</button>


		</body1>
=======
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
>>>>>>> cbcba765dc84c3af3e8369cfa8a520716878a0c5
	</div>

</div>


<? require 'template/tail.php' ?>
