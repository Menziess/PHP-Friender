<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">

		<? include 'template/errors&messages.php' ?>

		<div class="card full middle">
		<h2>All Users:</h2>
			<table>
				<thead>
					<tr>
						<th>Last name</th>
						<th>First name</th>
						<th>Email</th>
						<th>ID</th>
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
							<a href="/admin/edituser/<? echo $user->id ?>">
								<input type="button"
									class="button"
									value="Edit">
							</a>
						</td>
						<td>
							<form action="/user/<? echo $user->id ?>"
								method="POST">

								<!-- DELETE en PUT requests zijn HTTP standaard,
									maar niet onderdeel van HTML -->
								<input type="hidden" name="_method" value="DELETE">

								<input type="submit" value="Delete user">
							</form>
						</td>
						<td>
							<form action="admin/banuser"
								method="POST">
									<input type="hidden" name="_method" value="PUT">
									<input type="hidden" name="banned_user_id"
										value='<? echo $user->id ?>'/>

								<input type="submit"
									value="<? echo $user->is_banned ? "Unban user" : "Ban user" ?>">
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
