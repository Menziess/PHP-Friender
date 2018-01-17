<? include 'template/head.php' ?>

<div class="container" style="display:block">
	<div class="form">
		<form action="/login" method="POST">
			<input type="text" placeholder="Enter Username" name="email" required>
			<input type="password" placeholder="Enter Password" name="password" required>
			Remember me: <input type="checkbox" name="rememberme" value="1"><br>

			<!--
				ZO MOET DE BUTTON WORDEN:
			-->
			<input type="submit" value="Submit">
		</form>

		<!-- <button class="button button--secondary">
				<span class="button__inner"> SIGN IN!  </span>
		</button> -->

	</div>
</div>

<? include 'template/tail.php' ?>
