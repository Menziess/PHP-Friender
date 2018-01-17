<? include 'template/head.php' ?>

<div class="container">
	<div class="form-style-8">
		<form>
			<input type="text" placeholder="Enter Username" name="uname" required>
			<input type="password" placeholder="Enter Password" name="psw" required>
			Remember me: <input type="checkbox" name="rememberme" value="1"><br>
		</form>

<!--
		ZO MOET DE BUTTON WORDEN:
-->
		<!-- <input type="submit"> -->

		<button class="button button--secondary">
				<span class="button__inner"> SIGN IN!  </span>
		</button>

	</div>
</div>

<? include 'template/tail.php' ?>
