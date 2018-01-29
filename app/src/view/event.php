
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
				<h2 class="full">IT'S A MATCH!  <? echo $event['id'] ?></h2>
				<h4 class="full">
					<? $count = 0; ?>
					Welkom<? foreach ($matches as $key => $match) {
						if ($count++ < 3) echo ', ';
						else echo ' en ';
						echo $match['user']->first_name;
					}?>.
				</h4>
				<h4 class="full">
					Jullie zijn aan de hand van jullie antwoorden op de vragen aan elkaar
					gekoppeld en wij van Friender zien in jullie de perfecte
					vriendengroep!
				</h4>
				<? foreach ($matches as $match) { ?>
					<div class="half middle center">
					<h2> <?php echo $match['user']->first_name ?></h3>
					<? if ($match['picture']->filename): ?>
					<img src="/../../uploads/<? echo $match['picture']->filename ?>"
						width="200px" height="200px"
						class="profile-pic" alt="Profile picture">
					<? else: ?>
						<img src="/../../res/img/placeholder.jpg"
							width="200px" height="200px"
							class="profile-pic" alt="Nog geen foto">
					<? endif; ?>
					</div>
				<? } ?>
			</div>

			<div class="card background grid half">
<<<<<<< HEAD
				<h2 class="full"><? echo $event['name'] ?>
					<? echo $event['expiry_date'] ?></h2>
				<h5 class="full"><? echo $event['discription'] ?></h5>;
=======
				<h2 class="full"><? echo $event['name'] ?></h2>
				<h3 class="full"><? echo $event['description'] ?></h3>;
>>>>>>> 60ad358f450981bd3c06e9bfc8eaed4a17d553ac
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

			<? if (isset($messages)): ?>
			<ul data-ajax-container class="chatbox">
				<? foreach ($messages as $message) { ?>
					<li data-ajax-id="<? echo $message['id'] ?>">
						<? echo $message['first_name'] . ': ' . $message['message'] ?>
					</li>
				<? } ?>
			</ul>
			<? else: ?>
			Nog geen berichten.. Ga met elkaar praten om jullie activiteit te plannen!
			<? endif; ?>

			<form method="POST" data-ajax-form
				action="/conversation/<? echo $event['conversation_id'] ?>">

				<input type="hidden" name="_method" value="PUT">
				<input data-ajax-input
					name="message" type="text"
					placeholder="Typ een bericht..." autocomplete="off" />
				<input type="submit" value="Verstuur">
			</form>
		</div>
		<? endif; ?>

	</div>
</div>

<? include 'template/tail.php' ?>
