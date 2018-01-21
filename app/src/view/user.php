
<? require 'template/head.php' ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h1>
				<? if (isset($user)): ?>
				Hi, <? echo $user->first_name ?>.
				<? echo $message ?? "" ?>
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
		<? endif; ?>
	</div>

	<? if (!empty($users)): ?>

		<div class="grid dense">
			<? $grid_classes = ['full', 'half', 'quarter']; ?>
			<? foreach ($users as $user) { ?>
				<div class="card
					<?
						$i = array_rand($grid_classes);
						echo $grid_classes[$i];
					?>">

					<pre class="card-content">
						<? print_r($user); ?>
					</pre>
				</div>
			<? } ?>
		</div>

	<? endif; ?>
</div>

<? require 'template/tail.php' ?>
