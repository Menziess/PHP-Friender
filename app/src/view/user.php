<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">


		<? include 'template/errors&messages.php' ?>

		<style>
			.background {
				position: relative;
			}
			.background:after {
				content:'';
				background: url(/../../uploads/<? echo $picture->filename ?>);
				background-position: center center;
				background-size: cover;
				position: absolute;
				top:0px;
				left: 0px;
				width:100%;
				height:100%;
				z-index: -1;
				opacity: 0.1;
			}
			.background.card {
				background-color: transparent;
			}
		</style>

		<!-- Heeft background class -->
		<div class="background half grid card">

			<h2 class="full">Foto</h2>

			<div class="full center middle">
				<? if (isset($picture)): ?>
					<img src="/../../uploads/<? echo $picture->filename ?>"
						width="200px" height="200px"
						class="profile-pic" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						width="200px" height="200px"
						class="profile-pic" alt="Nog geen foto">
				<? endif; ?>
			</div>

			<div class="full middle">
				<input type="file" name="image"
					accept="image/x-png,image/jpeg,image/jpg">
			</div>

			<div class="full down middle">
				<input type="submit" value="upload foto">
			</div>
		</div>

		<div class="half grid card">

			<h2 class="full">Biografie</h2>

			<div class="center quarter right">
				<label for="bio">Biografie</label>
			</div>
			<div class="threequarter left">
				<textarea style="overflow-y:auto" rows="12" cols="76" name="bio"><? echo $user->bio ?></textarea>
			</div>

			<div class="full down middle">
				<input type="submit" value="werk biografie bij">
			</div>
		</div>

	</div>
</div>

<? include 'template/tail.php' ?>
