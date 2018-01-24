<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">


		<? include 'template/errors&messages.php' ?>


		<div class="full left">
		<h2>All Users:</h2>
			<table>
				<thead>
					<tr>
						<th>Last name</th>
						<th>First name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<!--Use a while loop to make a table row for every DB row-->
					<?php foreach($users as $user) { ?>
					<tr>
						<!--Each table column is echoed in to a td cell-->
						<td><?php echo $user->last_name; ?></td>
						<td><?php echo $user->first_name; ?></td>
						<td><?php echo $user->email; ?></td>
					</tr>
					<? } ?>
				</tbody>
			</table>
		</div>

	</div>
</div>

<? include 'template/tail.php' ?>
