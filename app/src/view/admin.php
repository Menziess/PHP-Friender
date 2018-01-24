<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">

		<? include 'template/errors&messages.php' ?>

		<div class="full middle">
		<h2>All Users:</h2>
			<table class="card">
				<thead>
					<tr>
						<th>Last name</th>
						<th>First name</th>
						<th>Email</th>
						<th>User ID </th>
						<th>Delete user?</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user) { ?>
					<tr>
						<td><?php echo $user->last_name; ?></td>
						<td><?php echo $user->first_name; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->id; ?></td>
						<td>
						<form action="/user/<? echo $user->id ?>"
							method="POST">

							<!-- DELETE en PUT requests zijn HTTP standaard,
								maar niet onderdeel van HTML -->
							<input type="hidden" name="_method" value="DELETE">

							<input type="submit" value="Delete user">
						</form>
						</td>
					</tr>
					<? } ?>
				</tbody>
			</table>
		</div>

	</div>
</div>

<? include 'template/tail.php' ?>
