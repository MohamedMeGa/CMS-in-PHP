
<table class="table table-bordered table-hover">
                        		<thead>
                        			<tr>
                        				<th>ID</th>
                        				<th>Athor</th>
                        				<th>Title</th>
                        				<th>Category</th>
                        				<th>Status</th>
                        				<th>Image</th>
                        				<th>Tags</th>
                        				<th>Comments</th>
                        				<th>Data</th>
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
										echo " <td><a href='posts.php?delete={$post_id}'>Deleted</td>";
										echo " <td><a href='posts.php?source=edit_post&edit_id={$post_id}'>Edit Post</td>";
										echo "<tr>";

                        			} 
                        			?>

								
                        		</tbody>
                        	</table>

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