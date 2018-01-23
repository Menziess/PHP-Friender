
<? include 'template/head.php' ?>

<div class="container">

	<div class="card">
		<h2 class="full">
			<? echo $message ?? "" ?>
		</h2>
		<h1>Gefeliciteerd met je FRIENDER account! </h1>
		<p1>Om je goed te kunnen matchen met nieuwe vrienden vragen wij </p1>
		<p1>je deze vragenlijst zo eerlijk mogelijk in te vullen.</p1>
	</div>

	<form class="card fixed" action="/questions" method="POST">

		<h2>Kies telkens de optie die het beste bij jou past</h2>

		<? if (isset($answers)): ?>
			<? foreach ($answers as $answer) { ?>
				<p>
					<input name="<? echo $answer->question_id ?>"
						type="radio" value="0" required checked>
						<? echo $answer->ans ?>
				</p>
			<? } ?>
		<? else: ?>
			<span class="error">No answers found.<span>
		<? endif; ?>

		<input type="submit" value="Submit">

	</form>
</div>

<? include 'template/tail.php' ?>
