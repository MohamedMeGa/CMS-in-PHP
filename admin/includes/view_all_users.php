
<table class="table table-bordered table-hover">
                        		<thead>
                        			<tr>
                        				<th>ID</th>
                        				<th>Name</th>
                        				<th>Email</th>
                        				<th>First name</th>
                        				<th>last name</th>
                        				<th>Role</th>
                        				<th>Admin</th>
                        				<th>Subscribtor</th>
                        				<th>Delete</th>
                        				<th>Edit</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<?php
                        			$comment_query 	= "SELECT * FROM users";
                        			$comment_result = mysqli_query($connection, $comment_query);
                        			while($row = mysqli_fetch_assoc($comment_result))
                        			{
                        				$user_id 		= $row['user_id'];
                        				$username		= $row['username'];
                        				$user_email		= $row['user_email'];
                        				$user_image		= $row['user_image'];
                        				$user_firstname	= $row['user_firstname'];
                        				$user_lastname	= $row['user_lastname'];
                        				$user_role		= $row['user_role'];
										echo "<tr> ";
										echo " <td>$user_id </td>";
										echo " <td>$username</td>";
										echo " <td>$user_email</td>";
										echo " <td>$user_firstname</td>";
										echo " <td>$user_lastname</td>";
										echo " <td>$user_role</td>";
										echo " <td><a href='users.php?admin_role={$user_id}'>Admin</td>";
										echo " <td><a href='users.php?subscribtor_role={$user_id}'>Subscribtor</td>";
										echo " <td><a onClick=\"javascript: return confirm('Are you Sure you Want to Delete this User');\" href='users.php?delete={$user_id}'>Deleted</td>";
										echo " <td><a href='users.php?source=edit_user&edit_id={$user_id}'>Edit</td>";
										echo "<tr>";

                        			} 
                        			?>

								
                        		</tbody>
                        	</table>

<?php

if(isset($_GET['admin_role'])){
	$admin_id = $_GET['admin_role'];
	$query_admin	= "UPDATE users SET user_role = 'admin' WHERE user_id = {$admin_id}";
	$result_admin	= mysqli_query($connection, $query_admin);

	if(!$result_admin)
	{
		die("Admin Query Failed" . mysqli_error($connection));
	}
	header("Location: users.php");
}

if(isset($_GET['subscribtor_role'])){
	$subscribtor_id = $_GET['subscribtor_role'];
	$query_subscribtor	= "UPDATE users SET user_role = 'subscribtor' WHERE user_id = {$subscribtor_id}";
	$result_subscribtor	= mysqli_query($connection, $query_subscribtor);

	if(!$result_subscribtor)
	{
		die("Subscribtor Query Failed" . mysqli_error($connection));
	}
	header("Location: users.php");
}


if(isset($_GET['delete'])){
	$delete_user_id = $_GET['delete'];
	$query_delete 	= "DELETE FROM users WHERE user_id = {$delete_user_id}";
	$result_delete 	= mysqli_query($connection, $query_delete);

	if(!$result_delete)
	{
		die("Deleted Query Failed" . mysqli_error($connection));
	}
	header("Location: users.php");
}
?>