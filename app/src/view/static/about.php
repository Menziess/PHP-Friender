<? include __DIR__ . '/../template/head.php' ?>

<div class="container">
	<div class="grid">

		<h2 class="full" style="color: #00ffb2; font-weight: bold;">
			OVER ONS
		</h2>

		<? foreach ($devs as $dev) { ?>
			<div class="quarter middle ">
				<b><? echo $dev->first_name ?></b>
				<br>
				<? echo $dev->bio ?>
			</div>

			<div class="quarter center">
				<? if ($dev->filename): ?>
					<img src="/../../uploads/<? echo $dev->filename ?>"
						width="125px" height="125px"
						class="profile-pic" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						width="125px" height="125px"
						class="profile-pic" alt="Nog geen foto">
				<? endif; ?>
			</div>
		<? } ?>
	</div>
</div>

<? include __DIR__ . '/../template/tail.php' ?>
