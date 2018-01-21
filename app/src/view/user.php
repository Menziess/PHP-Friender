
<? require 'template/head.php' ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h1>
				<? echo empty($user) ? 'Welcome...' : "Hi, " .
				$user->first_name . "." ?>
			</h1>

			<? if(isset($routes) && !empty($routes)): ?>
			<ol>
			<? foreach (array_reverse($routes) as $route => $action) { ?>
				<li><a href="<? echo "/$route" ?>"><? echo "/$route" ?></a></li>
			<? } ?>
			</ol>
			<? endif; ?>

		</div>

		<div class="card-content">
			<pre>
				<? # A user by id
				if (!empty($user))
					print_r($user);
				else if (isset($id))
					echo "User with id: $id not found...<br>";
				?>
			</pre>
		</div>
	</div>

	<? if (!empty($users)): ?>

		<div class="grid">
			<? foreach ($users as $user) { ?>
				<div class="card grid-item">
					<pre class="card-content">
						<? print_r($user); ?>
					</pre>
				</div>
			<? } ?>
		</div>

	<? endif; ?>
</div>

<? require 'template/tail.php' ?>
