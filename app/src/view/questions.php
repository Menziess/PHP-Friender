
<? include 'template/head.php' ?>

<div class="container">

	<div class="card">
		<h1>Gefeliciteerd met je FRIENDER account! </h1>
		<p1>Om je goed te kunnen matchen met nieuwe vrienden vragen wij </p1>
		<p1>je deze vragenlijst zo eerlijk mogelijk in te vullen.</p1>
	</div>

	<form class="card fixed" action="/questions" method="POST">

		<h2>Kies telkens de optie die het beste bij jou past</h2>

		<? if (isset($answers)): ?>
			<? for ( $i = 0 ; $i < count($answers); $i += 2 ) { ?>

				<p>

				<input name="<? echo $answers[$i]["question_id"] ?>"
					type="radio" value="0" required checked>
					<? echo $answers[$i]["ans"] ?>

				<br>

				<input name="<? echo $answers[$i + 1]["question_id"] ?>"
					type="radio" value="1" required>
					<? echo $answers[$i + 1]["ans"] ?>

				</p>

			<? } ?>
		<? else: ?>

			<span class="error">No answers found.<span>

		<? endif; ?>

		<input type="submit" value="Submit">

	</form>
</div>

<? include 'template/tail.php' ?>
