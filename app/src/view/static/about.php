
<? include __DIR__ . '/../template/head.php' ?>

<div class="card full">
<h2 class="full">
		OVER ONS
	</h2>
</div>


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

<div class="full">

<div class="grid">

	<div class="card full">
		<h2 class="full">
				Concept
			</h2>
	</div>

	<div class="card half">
			<h4 class="full">
			Alle bestaande social media platforms werken op dit moment niet voor het maken van
			vrienden, maar voor het onderhouden van de contacten die je al gemaakt hebt.
			Bij friender maak je die vrienden wel, aan de hand van je interesses koppelen wij
			je aan drie anderen en daarmee vormen jullie een vriendengroep. Naast het maken van
			een match regelen wij ook direct een activiteit voor je, zodat je je nieuwe vrienden
			direct kan ontmoeten. Tevens zetten we er een tijdsdruk op, want je moet binnen een
			week je activiteit. Dus laten we heel wat vrienden gaan maken, want je leeft langer
			door je vrienden! (zie hier rechts het bewijs). </h4>
	</div>

	<div class="card half">
		<br>
							<br>
		<h2  class="full">
			"Veel vrienden? Dan leef je langer!" - Libelle
			</h2>
			<br>
							<br>
							<br>
							<br>
			<h2  class="full">
			"Breaking news: dankzij jouw BFF leef je langer"  - Girlscene
			</h2>
	</div>

	<div class=" card full" >
		<h4 class="full" style = "text-align: left" >
							Hoe werkt Friender?
							<br>
							<br>
		1. 	Maak een account aan door op de homepage op signup te klikken <br>
			2. Dan gaan we er achter komen wat je intresses te zijn door je te laten kiezen tussen 23 dingen/stellingen <br>
			3. Als we deze gegevens van je hebben gaan we direct aan de gang je te matchen! <br>
			4. Geloof het of niet, maar na een tijdje wordt je gematcht en heb je daadwerkelijk een vriendengroep! <br>
			5. Jullie krijgen je eigen eventpage met activieit, hier kunnen jullie ook direct met elkaar chatten. <br>
			6. Zorg dat je zo snel mogelijk de activiteit plant (Je hebt maar 1 week de tijd). <br>
			7. That’s it, veel plezier met je nieuwe-beste-vrienden-club ! <br>
			</h4>
	</div>

</div>
</div>

<? include __DIR__ . '/../template/tail.php' ?>
