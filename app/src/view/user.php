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

			<h2 class="full"><? echo $user->first_name ?></h2>

			<div class="full center middle">
				<? if (isset($picture)): ?>
					<img src="/../../uploads/<? echo $picture->filename ?>"
						width="200" height="200"
						class="profile-pic-settings" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						width="200" height="200"
						class="profile-pic-settings" alt="Nog geen foto">
				<? endif; ?>
			</div>
			<div class="full">
				<span><? echo $user->bio ?? "$user->first_name heeft geen biografie ingevuld." ?></span>
			</div>
		</div>

		<div class="card half">
			<? if (isset($conversation)): ?>
				<? $conversation_id = $conversation->id; ?>
				<? include 'template/messenger.php' ?>
			<? else: ?>
				Er is iets fout gegaan bij het ophalen van de berichten van <? echo $user->first_name ?>.
			<? endif; ?>
		</div>

	</div>
</div>

<? include 'template/tail.php' ?>
