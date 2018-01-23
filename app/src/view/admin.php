<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">
		<div class="full left">
		<h2>All Users:</h2>
			<?
			foreach($users as $user) {
				echo $user->email. "	" . $user->last_name ; ?>
				<br>
			<?
			}
			?>
		</div>
	</div>
</div>

<? include 'template/tail.php' ?>
