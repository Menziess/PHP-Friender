
<? include __DIR__ . '/../template/head.php' ?>

<div class="full card grid">
	<h2 class="full">
		OVER ONS
	</h2>
	<? foreach ($devs as $dev) { ?>
		<div class="quarter middle">
			<b><? echo $dev->first_name ?></b>
			<br>
			<? echo $dev->bio ?>
		</div>

		<div class="quarter center">
			<? if ($dev->filename): ?>
				<img src="/../../uploads/<? echo $dev->filename ?>"
					width="125px" height="125px"
					class="profile-pic" alt="Profile picture">
			<? else: ?>
				<img src="/../../res/img/placeholder.jpg"
					width="125px" height="125px"
					class="profile-pic" alt="Nog geen foto">
			<? endif; ?>
		</div>
	<? } ?>
</div>

<div class="card half">
	<h4>
		Alle bestaande social media platforms hebben op dit moment niet als doel nieuwe vrienden te vinden,
		maar om de contacten die je al gemaakt hebt te onderhouden.
		Bij Friender maak je wel nieuwe vrienden! Aan de hand van je interesses koppelen wij
		jou aan drie anderen en daarmee wordt een nieuwe vriendengroep gevormd. Naast het maken van
		een match regelen wij ook direct een activiteit voor je, zodat je je nieuwe vrienden
		direct kan ontmoeten. Tevens zetten we er een tijdsdruk op, want na twee dagen verloopt je evenement.
		Dus laten we heel wat vrienden gaan maken, want je leeft langer
		door je vrienden! (zie hier rechts het bewijs).
	</h4>
</div>

<div class="card half grid">
	<h2 class="full middle center">
		"Veel vrienden? Dan leef je langer!"
		<br>
		- Libelle
	</h2>

	<h2  class="full middle center">
		"Breaking news: dankzij jouw BFF leef je langer"
		<br>
		- Girlscene
	</h2>
</div>

<div class=" card full" >
	<h2 class="full">
		Hoe werkt Friender?
	</h2>

	<ol>
		<li>Maak een account aan door op de homepage op sign up te klikken</li>
		<li>Dan gaan we er achter komen wat je interesses te zijn door je te laten kiezen tussen 23 dingen/stellingen</li>
		<li>Als we deze gegevens van je hebben gaan we direct aan de gang je te matchen!</li>
		<li>Geloof het of niet, maar na een tijdje wordt je gematcht en heb je daadwerkelijk een vriendengroep!</li>
		<li>Jullie krijgen je eigen eventpage met activieit, hier kunnen jullie ook direct met elkaar chatten.</li>
		<li>Zorg dat je zo snel mogelijk de activiteit plant (Je hebt maar 2 dagen de tijd).</li>
		<li>That’s it, veel plezier met je nieuwe-beste-vrienden-club!</li>

	</ol>
</div>


<? include __DIR__ . '/../template/tail.php' ?>
