<nav>
	<ul>

		<!-- Home -->
		<li>
			<a href="/">
				<img src="../../res/img/brand.png" alt="Logo">
			</a>
		</li>

		<!-- Profiel -->
		<li>
			<a class="nav-item" href="/user">Profiel</a>
		</li>

		<!-- Dropdown -->
		<?php if (isset($_COOKIE['first_name'])): ?>

		<li class="dropdown">
			<a class="nav-item" href="javascript:void(0)" class="dropbtn">
				<? echo $_COOKIE['first_name'] ?>
			</a>
			<div class="dropdown-content">
				<a href="/settings">Settings</a>
				<a href="/events">Events</a>
				<form action="/logout" method="POST">
					<input type="submit" value="Log out">
				</form>
			</div>
		</li>

		<?php else: ?>

		<li style="float: right;">
			<a class="nav-item" href="/login">Sign in</a>
		</li>

		<?php endif; ?>

	</ul>
</nav>
