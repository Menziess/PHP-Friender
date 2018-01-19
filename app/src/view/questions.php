
<? include 'template/head.php' ?>



<div class="container">

<div class="card">
		<p>Gefeliciteerd met je FRIENDER account! </p>
		<p>Om je goed te kunnen matchen met nieuwe vrienden vragen wij </p>
		<p>je deze vragenlijst zo eerlijk mogelijk in te vullen.</p>
	</div>
<div class="card">
	<h1>
		Kies telkens de optie die het beste bij jou past:
</h1>

<form action="/questions" method="POST">
	<p>
	<?

	for ( $i = 0 ; $i < count($answers); $i += 2 ) {
		echo '<input name=' . $answers[$i]["question_id"] . ' type="radio" value=' . $answers[$i]["id"] . ' required checked> ' . $answers[$i]["ans"] . "<br>";
		echo '<input name=' . $answers[$i + 1]["question_id"] . ' type="radio" value=' . $answers[$i + 1]["id"] . ' required> ' . $answers[$i + 1]["ans"] . "<br>";
		echo '<br>';
	}

	?>

	<button class="button">
		<input type="submit" value="Submit" class="button__inner">
	</button>
	</p>

	<input type="submit" value="Submit">
</form>


</div>
<!--
	<div>
		<img src="../logo2.png" alt="Logo">
		<p>Gefeliciteerd met je FRIENDER account! </p>
		<p>Om je goed te kunnen matchen met nieuwe vrienden vragen wij </p>
		<p>je deze vragenlijst zo eerlijk mogelijk in te vullen.</p>
	</div>

	<div class="row">
		<div class="side" style="background-color:#ffffff"></div>
		<div class="column" style="background-color: rgb(255, 255, 255)">
			<form action="/Webtechnieken-Voor-KI/sprint1/vragen.php" method="POST">
				<p>Kies bij elke vraag voor het antwoord dat het beste bij jou past.</p>
				<p class="kopjes">Algemene persoonlijkheid</p>
				<input name="dier" type="radio" value="hond" required> Hond
				<br>
				<input name="dier" type="radio" value="kat" required> Kat
				<br>
				<br>
				<input name="werken" type="radio" value="geld" required> Werken voor geld
				<br>
				<input name="werken" type="radio" value="life" required> Werken voor life
				<br>
				<br>
				<input name="seizoen" type="radio" value="zomer" required> Zomer
				<br>
				<input name="seizoen" type="radio" value="winter" required> Winter
				<br>
				<br>
				<input name="mens" type="radio" value="ochtendmens" required> Ochtendmens
				<br>
				<input name="mens" type="radio" value="avondmens" required> Avondmens
				<br>
				<br>
				<p class="kopjes">Eten en drinken</p>
				<input name="alcohol" type="radio" value="bier" required> Bier
				<br>
				<input name="alcohol" type="radio" value="fris" required> Fris
				<br>
				<br>
				<input name="fruit" type="radio" value="appel" required> Appel
				<br>
				<input name="fruit" type="radio" value="peer" required> Peer
				<br>
				<br>
				<input name="snack" type="radio" value="salade" required> Salade
				<br>
				<input name="snack" type="radio" value="snack" required> Snack
				<br>
				<br>
				<input name="avondeten" type="radio" value="pizza" required> Pizza
				<br>
				<input name="avondeten" type="radio" value="pasta" required> Pasta
				<br>
				<br>
				<input name="koken" type="radio" value="koken" required> Koken
				<br>
				<input name="koken" type="radio" value="uiteten" required> Uiteten
				<br>
				<br>
				<input name="drinken" type="radio" value="koffie" required> Koffie
				<br>
				<input name="drinken" type="radio" value="thee" required> Thee
				<br>
				<br>
				<p class="kopjes">Televisie en technisch</p>
				<input name="talkshow" type="radio" value="jinek" required> Jinek
				<br>
				<input name="talkshow" type="radio" value="rtlln" required> RTL Late Night
				<br>
				<br>
				<input name="spelprogramma" type="radio" value="expeditierobinson" required> Expeditie Robinson
				<br>
				<input name="spelprogramma" type="radio" value="widm" required> Wie is de Mol
				<br>
				<br>
				<input name="telefoon" type="radio" value="iphone" required> iPhone
				<br>
				<input name="telefoon" type="radio" value="android" required> Android
				<br>
				<br>
				<input name="socialmedia" type="radio" value="instagram" required> Instagram
				<br>
				<input name="socialmedia" type="radio" value="facebook" required> Facebook
				<br>
				<br>
				<p class="kopjes">Dilemma's</p>
				<input name="dilemma1" type="radio" value="34e verdieping" required> Op de 34e verdieping wonen zoner een lift
				<br>
				<input name="dilemma1" type="radio" value="rtlln" required> Digitale communicatie moet nu via handgeschreven brieven
				<br>
				<br>
				<input name="dilemma2" type="radio" value="niemand lacht" required> Niemand lacht ooit om wat jij zegt
				<br>
				<input name="dilemma2" type="radio" value="huilen" required> Je moet lachen als iemand anders huilt
				<br>
				<br>
				<p class="kopjes">Politiek</p>
				<input name="america" type="radio" value="trump" required> Trump
				<br>
				<input name="america" type="radio" value="hillary" required> Hillary
				<br>
				<br>
				<input name="verkiezingen" type="radio" value="klaver" required> Jesse Klaver 4 president
				<br>
				<input name="verkiezingen" type="radio" value="baudet" required> Thierry Baudet 4 president
				<br>
				<br>
				<p class="kopjes">Activiteiten</p>
				<input name="dagbesteding" type="radio" value="binnenmens" required> Een dag op de bank
				<br>
				<input name="dagbesteding" type="radio" value="buitenmens" required> Een wandeling door het bos
				<br>
				<br>
				<input name="uitgaan" type="radio" value="kroeg" required> Kroeg
				<br>
				<input name="uitgaan" type="radio" value="club" required> Club
				<br>
				<br>
				<input name="uitje" type="radio" value="bioscoop" required> Naar de bioscoop
				<br>
				<input name="uitje" type="radio" value="bowlen" required> Bowlen
				<br>
				<br>
				<p class="kopjes">Reizen en vakantie</p>
				<input name="geld uitgeven" type="radio" value="weekend" required> Een weekend weg
				<br>
				<input name="geld uitgeven" type="radio" value="kleding" required> Een nieuwe outfit scoren
				<br>
				<br>
				<input name="vakantie" type="radio" value="zon" required> Een reis naar de zon
				<br>
				<input name="vakantie" type="radio" value="wintersport" required> Wintersport
				<br>
				<br>
				<input type="submit" value="Submit">

			</form>
		</div>
	</div>
</div> -->



<? include 'template/tail.php' ?>
