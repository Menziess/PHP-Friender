<?

# Kijk of gebruiker antwoorden heeft ingevuld
if (isset($user) && $user->answers && strlen($user->answers) == 23)
	$userAnswers = str_split($user->answers, 1);

# Begin foreach loop
foreach ($answers as $index => $answer) {
	$one = $index % 2; ?>

	<? if (!$one): ?>

	<div id="<? echo $answer->question_id ?>" class="full card grid question">
		<h3 class="full center bolletje">
				<? echo $answer->question_id ?></h3>
		<div class="half middle">
			<label class="answer">
			<input name="<? echo $answer->question_id ?>"
				type="radio"
				value="1"
				required
				<? if (isset($userAnswers)
					&& $userAnswers[$answer->question_id - 1] == 0) {
					echo 'checked';
				}?>
				> <? echo ucfirst($answer->ans) ?></label>
		</div>

	<? else: ?>

		<div class="half middle">
			<label class="answer">
			<input name="<? echo $answer->question_id ?>"
				type="radio"
				value="0"
				required
				<? if (isset($userAnswers)
					&& $userAnswers[$answer->question_id - 1] == 1) {
					echo 'checked';
				}?>
				> <? echo ucfirst($answer->ans) ?></label>
		</div>

		<div class="full center">
			<button type="button" onclick="previous();">Vorige</button>
			<!-- <br> -->
			<!-- <progress max="100" value="25"></progress> -->
		</div>
	</div>

	<? endif; ?>

<?
} # Einde foreach loop
?>
