
<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">

		<? include 'template/errors&messages.php' ?>

		<? if (true): ?>
			<div class="card half">
				<h2>IT'S A MATCH! </h2>
				<h4>Welkom <? echo $user->first_name ?>, <? echo $user->first_name ?>,
				<? echo $user->first_name ?> en <? echo $user->first_name ?></h4>
				<br>
				<h4> Jullie zijn aan de hand van jullie enquete aan elkaar gekoppeld
				en wij van Friender zien in jullie de perfecte vrienden groep!</h4>
			</div>

			<div class="card half">
				<h2>Dit is jullie activiteit:  </h2>

				<? if (isset($picture)): ?>
					<img src="/../../uploads/<? echo $picture->filename ?>"
						width="300px" height="300px"
						class="profile-pic" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						width="300px" height="300px"
						class="profile-pic" alt="Nog geen foto">
				<? endif; ?>
			</div>

		<? else: ?>
			<div class="card full">
				<h2>Je hebt nog geen events</h2>
				<h3>Zorg dat je leuker bent en dus een match krijgt.</h3>
			</div>
		<? endif; ?>

		<div class="card full">

			<? if (isset($messages)): ?>
			<ul>
				<? foreach ($messages as $message) { ?>
					<li><? echo $message['first_name'] . ': ' . $message['message'] ?><e/li>
				<? } ?>
			</ul>
			<? else: ?>
			No messages...
			<? endif; ?>

			<form action="/event/message" method="POST">
				<input name="message" type="text">
				<input type="submit" value="Send">
			</form>

		</div>

		<? if (isset($matches)): ?>
			<div class="card full">
				JE SCORE MET ANDERE USERS

				<? foreach ($matches as $userid => $score) { ?>
					<br>
					User <? echo $userid ?> score: <? echo $score ?>
				<? } ?>
			</div>
		<?endif; ?>
	</div>

</div>

<? include 'template/tail.php' ?>
