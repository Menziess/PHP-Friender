
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
				background: url(/../../uploads/<? echo 'todo' ?>);
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

		<? if (isset($event)): ?>
			<div class="card grid half">
				<h2 class="full">IT'S A MATCH!</h2>
				<h4 class="full">
					<? $count = 0; ?>
					Welkom<? foreach ($matches as $key => $match) {
						if ($count++ < 3) echo ', ';
						else echo ' en ';
						echo $match['user']->first_name;
					}?>.
				</h4>
				<h4 class="full">
					Jullie zijn aan de hand van jullie enquete aan elkaar
					gekoppeld en wij van Friender zien in jullie de perfecte
					vrienden groep!
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

			<div class="card background grid half"
				style="background: url(/../../uploads/<?echo $match[22]['picture']->filename?>);">
				<h2 class="full">DIT IS JULLIE ACTIVITEIT:</h2>
			</div>

		<? else: ?>
			<div class="card grid full">
				<h2 class="full">Je hebt nog geen events.</h2>
				<p class="half middle center">
					Bekijk of je vragenlijst nog up-to-date is.
				</p>
				<a href="/questions" class="full middle">
					<input type="button" value="Vragenlijst">
				</a>
			</div>
		<? endif; ?>

		<? if (isset($event)): ?>
		<div class="card full">

			<? if (isset($messages)): ?>
			<ul>
				<? foreach ($messages as $message) { ?>
					<li><? echo $message['first_name'] . ': ' . $message['message'] ?><e/li>
				<? } ?>
			</ul>
			<? else: ?>
			Nog geen berichten.. Ga met elkaar praten om jullie activiteit te plannen!
			<? endif; ?>

			<form action="/event/message" method="POST">
				<input name="message" type="text" placeholder="Typ een bericht...">
				<input type="submit" value="Verstuur">
			</form>
		</div>
		<? endif; ?>

	</div>
</div>

<? include 'template/tail.php' ?>
