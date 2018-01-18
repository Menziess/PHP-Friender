<nav>
	<ul>
		<li>
			<a href="/">
				<img src="../../res/img/brand.png" alt="Logo">
			</a>
		</li>

		<li>
			<a class="nav-item" href="/user">Profiel</a>
		</li>

		<?php if (isset($_COOKIE['first_name'])) : ?>
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
		<li>
			<a class="nav-item" href="/login">Login</a>
		</li>
		<?php endif; ?>

	</ul>
</nav>
