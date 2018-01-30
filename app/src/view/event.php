
<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">

		<? include 'template/errors&messages.php' ?>

		<? if (isset($event)): ?>

			<style>
				.background {
					position: relative;
				}
				.background:after {
					content:'';
					background: url(/../../res/img/activities/<? echo $event['filename'] ?>);
					background-position: center center;
					background-size: cover;
					position: absolute;
					top:0px;
					left: 0px;
					width:100%;
					height:100%;
					z-index: -1;
					opacity: 0.8;
				}
				.background.card {
					background-color: #ffffff8e;
				}

			</style>

			<div class="card grid half">
				<div class="full">
					<h2 >IT'S A MATCH!</h2>
				</div>

				<? foreach ($matches as $match) { ?>
					<div class="quarter middle center">
						<a href='/user/<? echo $match['user']->user_id ?>'>
						<label class="profile-label">
							<? if ($match['picture']->filename): ?>
							<img src="/../../uploads/<? echo $match['picture']->filename ?>"
								width="200px" height="200px"
								class="profile-pic" alt="Profile picture">
							<? else: ?>
								<img src="/../../res/img/placeholder.jpg"
									width="200px" height="200px"
									class="profile-pic" alt="Nog geen foto">
							<? endif; ?>
						<? echo $match['user']->first_name; ?>
						</label>
						</a>
					</div>
				<? } ?>

				<h4 class="full">
					Jullie zijn aan de hand van jullie antwoorden op de vragen aan elkaar
					gekoppeld en wij van Friender zien in jullie de perfecte
					vriendengroep!
				</h4>
			</div>

			<div class="card background grid half">
				<h2 class="full"><? echo $event['name'] ?>
					<br>
					<span id="timer"><? echo $event['expiry_date'] ?></span>
				</h2>
				<h3 class="full"><? echo $event['description'] ?></h3>
			</div>

		<? else: ?>
			<div class="card grid full">
				<? if (isset($user) && !$user->answers): ?>
				<h2 class="full">Zorg dat je vragenlijst is ingevuld!</h2>
				<p class="full">Nadat je jouw innerlijk hebt vastgelegd zullen wij interessante mensen gaan zoeken, om bijvoorbeeld een kopje koffie mee te drinken. 😎</p>
				<? else: ?>
				<h2 class="full">We zijn hevig events aan het plannen!</h2>
				<p class="full">Controleer of je vragenlijst nog steeds up-to-date is. Je kunt je vragen ten aller tijden aanpassen.</p>
				<? endif; ?>
				<a href="/questions" class="full middle">
					<input type="button" value="Vragenlijst">
				</a>
			</div>
		<? endif; ?>

		<? if (isset($event)): ?>
			<div class="card full">
				<? $conversation_id = $event['conversation_id']; ?>
				<? include 'template/messenger.php' ?>
			</div>
		<? endif; ?>

	</div>
</div>

<? include 'template/tail.php' ?>
