<? include 'template/head.php' ?>

<? if (isset($user)): ?>
<style>
	.background {
		position: relative;
	}
	.background:after {
		content:'';
		background: url(/../../uploads/<? echo $picture->filename ?>);
		background-position: center center;
		background-size: cover;
		position: absolute;
		top:0px;
		left: 0px;
		width:100%;
		height:100%;
		z-index: -1;
		opacity: 0.1;
	}
	.background.card {
		background-color: transparent;
	}
</style>

<!-- Heeft background class -->
<div class="background half grid card">

	<h2 class="full"><? echo $user->first_name ?></h2>

	<div class="full center middle">
		<? if (isset($picture)): ?>
			<img src="/../../uploads/<? echo $picture->filename ?>"
				width="200" height="200"
				class="profile-pic-settings" alt="Profile picture">
		<? else: ?>
			<img src="/../../res/img/placeholder.jpg"
				width="200" height="200"
				class="profile-pic-settings" alt="Nog geen foto">
		<? endif; ?>
	</div>
	<div class="full">
		<span><? echo $user->bio ?? "$user->first_name heeft geen biografie ingevuld." ?></span>
	</div>

	<? if ($user->id !== $_SESSION['user_id']): ?>
	<div class="full center">
		<form action="/user/togglefriend/<?echo $user->id?>"
			method="POST">
			<input type="submit"
				value="<? echo count($isvisitorfriend) > 0 ? "Verwijder als vriend" : "Voeg toe als vriend" ?>">
		</form>
	</div>
	<? endif; ?>
</div>

<div class="card half chat">
	<? if (isset($conversation)): ?>
		<? $conversation_id = $conversation->id; ?>
		<? include 'template/messenger.php' ?>
	<? else: ?>
		Er is iets fout gegaan bij het ophalen van de berichten van <? echo $user->first_name ?>.
	<? endif; ?>
</div>
<? endif; ?>

<? if (isset($friendlist)): ?>
<div class="card grid half">
	<div class="full">
		<h2><? echo $user->first_name ?>'s vrienden</h2>
	</div>

	<? foreach ($friendlist as $friend) { ?>
		<div class="quarter middle center">
			<a href='/user/<? echo $friend->friend_id ?>'>
			<label class="profile-label">
				<? if (isset($friend->filename)): ?>
				<img src="/../../uploads/<? echo $friend->filename ?>"
					width="200px" height="200px"
					class="profile-pic" alt="Profile picture">
				<? else: ?>
					<img src="/../../res/img/placeholder.jpg"
						width="200px" height="200px"
						class="profile-pic" alt="Nog geen foto">
				<? endif; ?>
			<? echo $friend->first_name; ?>
			</label>
			</a>
		</div>
	<? } ?>
</div>
<? endif; ?>

<? include 'template/tail.php' ?>
