<?php 
if(isset($_POST['checkBoxArray']))
{
	$check = $_POST['checkBoxArray'];

	foreach($check as $post_valueID)
	{
		$bulk_options = $_POST['bulk_optons'];
		switch ($bulk_options) {
			case 'denied':
					$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_valueID}";
					$result = mysqli_query($connection, $query);
				break;

			case 'active':
					$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_valueID}";
					$result = mysqli_query($connection, $query);
					if(!$result)
					{
						echo "Status QUERY FAILED " . mysqli_error($connection);
					}
				break;

				case 'clone':
					$query = "SELECT * FROM posts WHERE post_id = {$post_valueID}";
                    $result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $post_title		= $row['post_title'];
                        $post_author	= $row['post_author'];
                        $post_category	= $row['post_category_id'];
                        $post_status	= $row['post_status'];
                        $post_image		= $row['post_image'];
                        $post_tags		= $row['post_tags'];
                        $post_comment	= $row['post_comment_count'];
                        $post_content	= $row['post_content'];

                    }

                    $query_in = "INSERT INTO posts(post_category_id, post_title, post_author, post_data, post_image, post_content, post_tags,  post_status, post_comment_count)";
					$query_in .= "VALUES({$post_category}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}', '{$post_comment}')";
					$result = mysqli_query($connection, $query_in);
					if (!$result) {
						die("QUERY FAILED" . mysqli_error($connection));
					}
				break;
			
			default:
				// code...
				break;
		}
	}
}
?>

<form action="" method="post">
<table class="table table-bordered table-hover">


							<div id="bulkOptionContainer" class="col-xs-4">
								

								<select class="form-control" name="bulk_optons">
									<option>Select Option</option>
									<option value="denied">Denied</option>
									<option value="active">Active</option>
									<option value="clone">Clone</option>
								</select>
									</div>
									<div id="bulkOptionContainer" class="col-xs-4">
									<input type="submit" name="submit" class="btn btn-primary" value="Apply">
									<a href="posts.php?source=add_post" class="btn btn-default">Add New Post</a>
								
								</div>

                        		<thead>
                        			<tr>
                        				<th><input type="checkbox" name="" id="selectAllPost"></th>
                        				<th>ID</th>
                        				<th>Athor</th>
                        				<th>Title</th>
                        				<th>Category</th>
                        				<th>Status</th>
                        				<th>Image</th>
                        				<th>Tags</th>
                        				<th>Comments</th>
                        				<th>Data</th>
                        				<th>View</th>
                        				<th>Action</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<?php
                        			$query = "SELECT * FROM posts";
                        			$result = mysqli_query($connection, $query);
                        			while($row = mysqli_fetch_assoc($result))
                        			{
                        				$post_id 		= $row['post_id'];
                        				$post_title		= $row['post_title'];
                        				$post_author	= $row['post_author'];
                        				$post_category	= $row['post_category_id'];
                        				$post_status	= $row['post_status'];
                        				$post_image		= $row['post_image'];
                        				$post_tags		= $row['post_tags'];
                        				$post_comment	= $row['post_comment_count'];
                        				$post_data		= $row['post_data'];
										echo "<tr> ";
										echo "<th><input class='checkBoxs' type='checkbox' name='checkBoxArray[]' value='{$post_id}'></th>";
										echo " <td>$post_id </td>";
										echo " <td>$post_author</td>";
										echo " <td>$post_title</td>";

										$cat_query = "SELECT * FROM categories WHERE cat_id = {$post_category}";
										$cat_result = mysqli_query($connection, $cat_query);
										while($row = mysqli_fetch_assoc($cat_result))
										{
											$post_cat_title = $row['cat_title'];
											
											echo " <td>$post_cat_title</td>";
										}
										
										echo " <td>$post_status</td>";
										echo " <td><img width='100' src='../images/$post_image	'></td>";
										echo " <td>$post_tags</td>";
										echo " <td>$post_comment</td>";
										echo " <td>$post_data</td>";
										echo " <td><a href='../post.php?p_id={$post_id}'>View</a></td>";
										echo " <td><a href='posts.php?delete={$post_id}'>Deleted</a>";
										echo "  or <a href='posts.php?source=edit_post&edit_id={$post_id}'>Edit Post</a></td>";
										echo "<tr>";

                        			} 
                        			?>

								
                        		</tbody>
                        	</table>
                        	</form>

<?php 
if(isset($_GET['delete'])){
	$delete_post_id = $_GET['delete'];
	$query_delete 	= "DELETE FROM posts WHERE post_id = {$delete_post_id}";
	$result_delete 	= mysqli_query($connection, $query_delete);

	if(!$result_delete)
	{
		die("Deleted Query Failed" . mysqli_error($connection));
	}
}
?>