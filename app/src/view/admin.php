<? include 'template/head.php' ?>

<div class="container">
	<div class="grid">

		<? include 'template/errors&messages.php' ?>

		<div class="full middle">
		<h2>All Users:</h2>
			<table>
				<thead>
					<tr>
						<th>Last name</th>
						<th>First name</th>
						<th>Email</th>
						<th>User ID </th>
						<th>Verwijder user?</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user) { ?>
					<tr>
						<td><?php echo $user->last_name; ?></td>
						<td><?php echo $user->first_name; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->id; ?></td>
						<td><form action="/admin" method="POST">
							<input type="number" placeholder="User ID">
							<input type="submit" value="Verwijder user">
						</form></td>
					</tr>
					<? } ?>
				</tbody>
			</table>
		</div>

	</div>
</div>

<?
    public function delete_user($id);
    {
        $this->db->delete('users', array('id' => $id));
    }
?>

<? include 'template/tail.php' ?>

