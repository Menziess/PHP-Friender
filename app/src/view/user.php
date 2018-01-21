
<? require 'template/head.php' ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h1>
				<? if (isset($user)): ?>
				Welcome, <? echo $user->first_name ?>.
				<? else: ?>
				Welcome!
				<? endif; ?>
			</h1>

			<? if(isset($routes) && !empty($routes)): ?>
			<ol>
			<? foreach (array_reverse($routes) as $route => $action) { ?>
				<li><a href="<? echo "/$route" ?>"><? echo "/$route" ?></a></li>
			<? } ?>
			</ol>
			<? endif; ?>

		</div>

		<? if (isset($user)): ?>
		<div class="card-content">
			<pre>
				<? print_r($user); ?>
			</pre>
		</div>
		<? elseif (isset($id)): ?>
			User with id: <? echo $id ?> not found...
		<? endif; ?>
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
