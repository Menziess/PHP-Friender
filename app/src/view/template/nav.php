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
				<a href="/settings">Settings</a>
				<form id="logout" action="/logout" method="POST">
					<a href="javascript:$('#logout').submit();" type="submit" value="Log out">Logout</a>
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
			<a href="/login">Sign in</a>
		</li>

	<?php endif; ?>

	</ul>
</nav>
