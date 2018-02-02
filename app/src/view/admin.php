<? include 'template/head.php' ?>

<div class="card full middle">
	<? if (!isset($users)): ?>
	<a href="/admin/user">
		<input type="button" value="Gebruikers">
	</a>
	<? endif; ?>
	<? if (!isset($activities)): ?>
	<a href="/admin/activity">
		<input type="button" value="Activiteiten">
	</a>
	<? endif; ?>
</div>

<? if (isset($users)): ?>
<div class="card full middle" style="overflow: auto">
	<h2>All Users:</h2>
	<table>
		<thead>
			<tr>
				<th>Achternaam</th>
				<th>Voornaam</th>
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

						<input type="submit" value="Delete">
					</form>
				</td>
				<td>
					<form action="/admin/banuser"
						method="POST">
							<input type="hidden" name="_method" value="PUT">
							<input type="hidden" name="banned_user_id"
								value='<? echo $user->id ?>'/>

						<input type="submit"
							value="<? echo $user->is_banned ? "Unban" : "Ban" ?>">
					</form>
				</td>
			</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<? endif ?>

<? if (isset($activities)): ?>
<div class="card full middle" style="overflow: auto">
	<h2>Activities:</h2>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Foto</th>
				<th>Naam</th>
				<th>Beschrijving</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($activities as $activity) { ?>
			<tr>
				<td><?php echo $activity->id; ?></td>
				<td>
					<? if ($activity->filename): ?>
					<img src="/../../res/img/activities/<? echo $activity->filename ?>"
						width="200px" height="200px"
						class="profile-pic" alt="Profile picture">
					<? else: ?>
						<img src="/../../res/img/placeholder.jpg"
							width="200px" height="200px"
							class="profile-pic" alt="Nog geen foto">
					<? endif; ?>
				</td>
				<td><?php echo $activity->name; ?></td>
				<td><?php echo $activity->description; ?></td>
				<td>
					<form action="/activity/<? echo $activity->id ?>"
						method="POST">

						<!-- DELETE en PUT requests zijn HTTP standaard,
							maar niet onderdeel van HTML -->
						<input type="hidden" name="_method" value="DELETE">

						<input type="submit" value="Delete">
					</form>
				</td>
			</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<? endif ?>

<? include 'template/tail.php' ?>
