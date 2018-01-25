
<? include 'template/head.php' ?>

<div class="container">

	<form class="grid dense" action="/questions" method="POST">

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

				<? if ($oneOrZero == 1) {
					$vraag_nr = $index / 2 + 1;
					if (strlen($answer->ans) > 10)
						echo '<div class="half card">';
					else
						echo '<div class="quarter card">';
					echo "<h3>Vraag: $vraag_nr</h3>";
				} ?>
				<input name="<? echo $answer->question_id ?>"
					type="radio" value="<? echo $oneOrZero ?>"
					required
					<? echo isset($userAnswers)
						&& $userAnswers[$vraag_nr - 1] == $oneOrZero
						? 'checked' : '' ?>
					>
					<? echo $answer->ans ?>
				<br>
				<? if ($oneOrZero == 0) echo '</div>'; ?>
			<? } ?>

		<? else: ?>
			<span class="error">No answers found.<span>
		<? endif; ?>

		<div class="card full">
			<input type="submit" value="Zoek naar Vrienden!">
		</div>
	</form>
</div>

<? include 'template/tail.php' ?>
