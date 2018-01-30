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
				<? echo $answer->question_id ?>
		</h3>
		<div class="half middle">
			<input name="<? echo $answer->question_id ?>"
				id="<? echo $answer->question_id ?>-1"
				class="answer"
				type="radio"
				value="1"
				hidden
				required
				<? if (isset($userAnswers)
					&& $userAnswers[$answer->question_id - 1] == 1) {
					echo 'checked';
				}?>
				>
			<label for="<? echo $answer->question_id ?>-1">
				<? echo ucfirst($answer->ans) ?>
			</label>
		</div>

	<? else: ?>

		<div class="half middle">
			<input name="<? echo $answer->question_id ?>"
				id="<? echo $answer->question_id ?>-0"
				class="answer"
				type="radio"
				value="0"
				hidden
				required
				<? if (isset($userAnswers)
					&& $userAnswers[$answer->question_id - 1] == 0) {
					echo 'checked';
				}?>
				>
			<label for="<? echo $answer->question_id ?>-0">
				<? echo ucfirst($answer->ans) ?>
			</label>
		</div>

		<div class="full center">
			<button type="button" onclick="previous();">Vorige</button>
		</div>

	</div>

	<? endif; ?>

<?
} # Einde foreach loop
?>
