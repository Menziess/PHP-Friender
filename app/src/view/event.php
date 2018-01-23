
<? include 'template/head.php' ?>

<div class="container">

<div class="grid">
<!--
	<? if (true): ?>
		<div class="card half">
			<h2>IT'S A MATCH! </h2>
			<p1>Welkom <? echo $user->first_name ?>, <? echo $user->first_name ?>,
			<? echo $user->first_name ?> en <? echo $user->first_name ?> </p1>
			<br>
			<p1> Jullie zijn aan de hand van jullie enquete aan elkaar gekoppeld
			en wij van Friender zien in jullie de perfecte vrienden groep! </p1>
		</div>
		<div class="card half">
			<h2>Dit is jullie activiteit:  </h2>

			<? if (isset($picture)): ?>
				<img src="/../../uploads/<? echo $picture->filename ?>"
					width="300px" height="300px"
					class="profile-pic" alt="Profile picture">
			<? else: ?>
				<img src="/../../res/img/placeholder.jpg"
					width="300px" height="300px"
					class="profile-pic" alt="Nog geen foto">
			<? endif; ?>
		</div>

	<? else: ?>
		<div class="card full">
			<h2>Je hebt nog geen events </h2>
			<p1>Zorg dat je leuker bent en dus een match krijgt. </p1>
		</div>
	<? endif; ?> -->

	<div class="card full">
		JE KAN MESSENGEREN HIER
	</div>

	<? if (isset($scores)): ?>
		<div class="card full">
			JE SCORE MET ANDERE USERS

			<? foreach ($scores as $userid => $score) { ?>
				<br>
				User <? echo $userid ?> score: <? echo $score ?>
			<? } ?>
		</div>
	<?endif; ?>
</div>

<? include 'template/tail.php' ?>
