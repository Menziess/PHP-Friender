
<? include 'template/head.php' ?>

	<form id="questions" class="full grid dense" action="/questions" method="POST">

		<? if (isset($event)): ?>
			<article class="full card">
				Je bent al geplaatst in een evenement, <a href="/event">je vrienden wachten</a> op je!
			</article>
		<? else: ?>

			<article class="half card">
				<h2>Kies telkens de optie die het beste bij jou past</h2>
				<p>Om je goed te kunnen matchen met nieuwe vrienden vragen wij je deze vragenlijst zo eerlijk mogelijk in te vullen. 😉</p>
			</article>

			<article class="half card">
				<h2>Je voortgang:</h2>
				<progress class="progress_bar" id="question_number" value="0" max="23">
				</progress>
			</article>

			<? if (isset($answers)): ?>
				<? include 'static/question.php' ?>
			<? else: ?>
				<span class="full card error">Geen antwoorden gevonden.<span>
			<? endif; ?>

		<? endif; ?>

	</form>

<? include 'template/tail.php' ?>
