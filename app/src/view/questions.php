
<? include 'template/head.php' ?>

<div class="container">

	<form id="question" class="grid dense" action="/questions" method="POST">

		<? include 'template/errors&messages.php' ?>

		<article class="half card">
			<h2>Kies telkens de optie die het beste bij jou past</h2>
			<p>Om je goed te kunnen matchen met nieuwe vrienden vragen wij je deze vragenlijst zo eerlijk mogelijk in te vullen. 😉</p>
		</article>

		<? if (isset($answers)): ?>

			<?
			if (isset($user) && $user->answers) {
				$userAnswers = str_split($user->answers, 1);
			} ?>

			<? foreach ($answers as $index => $answer) {
				$oneOrZero = (int) $index % 2 == 0 ? 1 : 0; ?>

				<? if ($oneOrZero == 1): ?>
					<? $vraag_nr = $index / 2 + 1; ?>
					<div id="<? echo $vraag_nr ?>" vraag="vraag"
						class="full card grid"
						style="display: none">
						<h3 class="full">Vraag: <? echo $vraag_nr ?></h3>
				<? endif; ?>

				<input name="<? echo $answer->question_id ?>"
					class="full"
					type="radio" value="<? echo $oneOrZero ?>"
					required
					<? echo isset($userAnswers)
						&& $userAnswers[$vraag_nr - 1] == $oneOrZero
						? 'checked' : '' ?>
					>
					<? echo $answer->ans ?>
					<br>
				<? if ($oneOrZero == 0): ?>
						<button id="previous"
							type="button"
							value="Vorige"></button>
						<button id="next"
							type="button"
							value="Volgende"></button>
					</div>
				<? endif; ?>
			<? } ?>

		<? else: ?>
			<span class="error">Geen antwoorden gevonden.<span>
		<? endif; ?>
	</form>
</div>

<? include 'template/tail.php' ?>
