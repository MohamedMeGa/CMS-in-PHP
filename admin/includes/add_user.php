<?php 
if(isset($_POST['create_user'])){
	$username			= $_POST['username'];
	$user_email			= $_POST['user_email'];
	$user_password		= $_POST['user_password'];
	$user_role			= $_POST['user_role'];
	$user_image			= $_FILES['user_image']['name'];
	$user_image_tmp		= $_FILES['user_image']['tmp_name'];
	$user_firstname		= $_POST['user_firstname'];
	$user_lastname		= $_POST['user_lastname'];


	move_uploaded_file($user_image_tmp, "../images/$user_image");

	$query = "INSERT INTO users(username, user_email, user_password, user_role, user_image, user_firstname, user_lastname)";
	$query .= "VALUES('{$username}', '{$user_email}', '{$user_password}', '{$user_role}', '{$user_image}', '{$user_firstname}', '{$user_lastname}')";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("QUERY FAILED" . mysqli_error($connection));
	}

	echo "User Created: " . "<a href='users.php' class='btn btn-primary'>View Users</a>";

	
}
?>










<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="lastname">Last Name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="title">UserName</label>
		<input type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="user_email">User E-mail</label>
		<input type="email" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="user_email">User Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>

	<div class="form-group">
		<label for="role">User Role</label>
		<select name="user_role" id="">
			<option value="admin">Admin</option>
			<option value="subscribtor">Subscribtor</option>
		</select>
	</div>

	<div class="form-group">
		<label for="user_image">Post image</label>
		<input type="file" class="form-control" name="user_image">
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Create User">
	</div>

</form>