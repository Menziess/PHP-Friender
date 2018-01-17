<? include 'template/head.php' ?>

<div class="container">
	<form action="/login" method="POST">

		<h2>Log in</h2>

		<span style="error">
			<? echo $error ?? "" ?>
		</span>

		<input type="email" placeholder="Enter Username" name="email" required>
		<input type="password" placeholder="Enter Password" name="password" required>

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
