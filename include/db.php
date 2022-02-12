<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_password'] = "";
$db['db_name'] = "cms";

/*foreach ($db as $key => $value) {
	define(strtoupper($key), $value);

}*/

$connection = mysqli_connect($db['db_host'], $db['db_user'], $db['db_password'], $db['db_name']);
// $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/*if($connection)
{
	echo "you are connected";
}else{
	echo "Not Connected";
}*/
?>