<?php 
include "db.php";
session_start();

if(isset($_POST['login']))
{
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	
	$query = "SELECT * FROM users WHERE username = '{$username}'";
	$result = mysqli_query($connection, $query);
	
	if (!$result) {
		die("LOGIN QUERY FAILED" . mysqli_error($connection));
	}

	while($row = mysqli_fetch_assoc($result))
	{
		$db_user_id 		= $row['user_id'];
		$db_username 		= $row['username'];
		$db_password 		= $row['user_password'];
		$db_user_firstname 	= $row['user_firstname'];
		$db_user_lastname	= $row['user_lastname'];
		$db_user_role		= $row['user_role'];
		$salt   			= $row['randSalt'];
	}


        $password = crypt($password,  $salt);
	
	if($username === $db_username && $password === $db_password){

		$_SESSION['username'] = $db_username;
		$_SESSION['user_firstname'] = $db_user_firstname;
		$_SESSION['user_lastname']	= $db_user_lastname;
		$_SESSION['user_role']		= $db_user_role;
		header('Location: ../admin');

	}else{
		header('Location: ../index.php');

	}
}
?>
