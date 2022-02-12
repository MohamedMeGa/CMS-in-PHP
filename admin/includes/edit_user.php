<?php 
if($_GET['edit_id'])
{
	$user_id = $_GET['edit_id'];
	$query = "SELECT * FROM users WHERE user_id = $user_id ";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result))
	{

		$user_id 		= $row['user_id'];
        $username		= $row['username'];
        $user_email		= $row['user_email'];
        $user_image		= $row['user_image'];
        $user_firstname	= $row['user_firstname'];
        $user_lastname	= $row['user_lastname'];
        $user_role		= $row['user_role'];
    
	}
}







if(isset($_POST['edit_user'])){
	$username			= $_POST['username'];
	$user_email			= $_POST['user_email'];
	$user_password		= $_POST['user_password'];
	$user_role			= $_POST['user_role'];
	$user_image			= $_FILES['user_image']['name'];
	$user_image_tmp		= $_FILES['user_image']['tmp_name'];
	$user_firstname		= $_POST['user_firstname'];
	$user_lastname		= $_POST['user_lastname'];


	move_uploaded_file($user_image_tmp, "../images/$user_image");

	$query = "UPDATE users SET username = '{$username}', user_email = '{$user_email}', user_password = '{$user_password}', user_role = '{$user_role}', user_image = '{$user_image}', user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}' WHERE user_id = {$user_id}";

	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("QUERY FAILED" . mysqli_error($connection));
	}

	
}
?>










<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?>">
	</div>

	<div class="form-group">
		<label for="lastname">Last Name</label>
		<input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname;?>">
	</div>

	<div class="form-group">
		<label for="title">UserName</label>
		<input type="text" class="form-control" name="username"  value="<?php echo $username;?>">
	</div>

	<div class="form-group">
		<label for="user_email">User E-mail</label>
		<input type="email" class="form-control" name="user_email"  value="<?php echo $user_email;?>">
	</div>

	<div class="form-group">
		<label for="user_email">User Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>

	<div class="form-group">
		<label for="role">User Role</label>
		<select name="user_role" id="">

			<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
			<?php if ($user_role == 'admin') {
				echo "<option value='subscribtor'>Subscribtor</option>";
			}else{
				echo "<option value='admin'>Admin</option>";
			}?>		
		</select>
	</div>

	<div class="form-group">
		<label for="user_image">Post image</label>
		<img src="<?php echo $user_image; ?>">
		<input type="file" class="form-control" name="user_image">
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
	</div>

</form>