<? include 'template/head.php' ?>

<div class="container">
	<form action="/login" method="POST">

		<h2>Log in</h2>

		<input type="email" placeholder="Enter Email" name="email"
		value="<? echo $email ?? "" ?>" required>
		<input type="password" placeholder="Enter Password" name="password" required>

		<span class="error">
			<? echo $error ?? "" ?>
		</span>

		<br>

		<input name="rememberme" type="checkbox"
			checked="checked"> Remember me

		<br>

		<!--
			ZO MOET DE BUTTON WORDEN:
		-->

		<input type="submit" value="Submit">

		<!-- <button class="button button--secondary">
				<span class="button__inner"> SIGN IN!  </span>
		</button> -->

	</form>
</div>

<? include 'template/tail.php' ?>
