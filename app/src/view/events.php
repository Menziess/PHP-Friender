

<? include 'template/head.php' ?>



<div class="container">


<div class="grid">

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
	<div style="grid-area: span 1 / span 3" class="center right">
				<? if (isset($picture)): ?>
					<img src="/../../uploads/<? echo $picture->filename ?>"
						class="profile-pic" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						class="profile-pic" alt="Nog geen foto">
				<? endif; ?>
			</div>

				<? else: ?>
				<div class="card half">
					<h2>Je hebt nog geen events </h2>
					<p1>Zorg dat je leuker bent en dus een match krijgt. </p1>
				</div>
				<? endif; ?>
</div>
	<div class="card half">
	JE KAN MESSENGEREN HIER
	</div>

</div>

<? include 'template/tail.php' ?>


