<?php
function insert_category()
{
	global $connection;
	if(isset($_POST['submit']))
    {
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title))
        {
            echo "This field should not be empty";
        }else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die('QUERY FAILED ' . mysqli_error($connection));
            }
        }
    }
}


function findAllCategory()
{
	global $connection;
	$query = "SELECT * FROM categories";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		$cat_id = $row['cat_id'];
		echo "<tr> <td>{$row['cat_id']}</td>";
		echo " <td>{$row['cat_title']}</td>";
		echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
		echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td> </tr>";
	}
}

function DeletePost(){
    global $connection;
	if(isset($_GET['delete']))
    {
        $cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
        $result = mysqli_query($connection, $query);
        if ($result) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
                        				// header("Location: categories.php");
    }
}
?>