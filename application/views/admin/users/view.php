<?php
if(isset($added)) {
	echo "<div class=\"alert alert-success\"><button class=\"close\" data-dismiss=\"alert\">×</button><strong>Success!</strong> User has been created.</div>";
}
?>

<div class="page-header">
	<h1>View Users</h1>
</div>

<p><a href="<?php echo site_url('admin/users/add'); ?>"><button class="btn btn-primary">Add New User</button></a></p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Surname</th>
			<th>Forename</th>
			<th>Username</th>
			<th>Email</th>
			<th>Date / Time Created</th>
			<th>Last Updated</th>
			<th>Active</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($users as $row) {
			echo "<tr>\n";
			echo "	<td>" . strtoupper($row->surname) . "</td>\n";
			echo "	<td>" . $row->forename . "</td>\n";
			echo "	<td>" . $row->username . "</td>\n";
			echo "	<td>" . $row->email . "</td>\n";
			echo "	<td>" . formatUkDateTime($row->created_at) . "</td>\n";
			echo "	<td>" . formatUkDateTime($row->updated_at) . "</td>\n";
			$active = ($row->active == 1) ? '<i class="icon-ok"></i>' : '<i class="icon-remove"></i>';
			echo "	<td>" . $active . "</td>\n";
			echo "	<td><a href=\"" . site_url('admin/users/edit/' . $row->id) . "\"><button class=\"btn btn-mini btn-warning\">Edit</button></a>&nbsp;<a href=\"" . site_url('admin/users/delete/' . $row->id) . "\"><button class=\"btn btn-mini btn-danger\">Delete</button></a></td>\n";
			echo "</tr>\n";
		}
		?>
	</tbody>

</table>