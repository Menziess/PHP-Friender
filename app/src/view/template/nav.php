<nav>
	<ul>

	<!-- Ingelogd -->
	<?php if (isset($_SESSION['first_name'])): ?>

		<li class="brand">
			<a href="/event">
				<img src="../../res/img/brand.png" alt="Logo">
			</a>
		</li>

		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">
				<? echo $_SESSION['first_name'] ?>
			</a>
			<div class="dropdown-content">

				<? if ($_SESSION['is_admin']): ?>
					<a href="/admin">Admin</a>
				<? endif; ?>
				<a href="/user">Profiel</a>
				<a href="/settings">Instellingen</a>
				<form id="logout" action="/logout" method="POST">
					<input type="submit" value="Uitloggen">
				</form>
			</div>
		</li>

	<!-- Niet ingelogd -->
	<?php else: ?>

		<li class="brand">
			<a href="/">
				<img src="../../res/img/brand.png" alt="Logo">
			</a>
		</li>

		<li class="dropdown">
			<a href="/login">Log in</a>
		</li>

	<?php endif; ?>

	</ul>
</nav>
