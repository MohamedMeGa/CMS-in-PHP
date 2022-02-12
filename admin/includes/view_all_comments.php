
<table class="table table-bordered table-hover">
                        		<thead>
                        			<tr>
                        				<th>ID</th>
                        				<th>Athor</th>
                        				<th>Email</th>
                        				<th>Post Title</th>
                        				<th>Status</th>
                        				<th>Contetent</th>
                        				<th>Data</th>
                        				<th>Approve</th>
                        				<th>Unapprove</th>
                        				<th>Delete</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<?php
                        			$comment_query 	= "SELECT * FROM comments";
                        			$comment_result = mysqli_query($connection, $comment_query);
                        			while($row = mysqli_fetch_assoc($comment_result))
                        			{
                        				$comment_id 		= $row['comment_id'];
                        				$comment_post_id	= $row['comment_post_id'];
                        				$comment_author		= $row['comment_author'];
                        				$comment_email		= $row['comment_email'];
                        				$comment_content	= $row['comment_content'];
                        				$comment_status		= $row['comment_status'];
                        				$comment_date		= $row['comment_date'];
										echo "<tr> ";
										echo " <td>$comment_id </td>";
										echo " <td>$comment_author</td>";
										echo " <td>$comment_email</td>";

										$query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
										$result = mysqli_query($connection, $query);

										while($row = mysqli_fetch_assoc($result))
										{
											$post_title = $row['post_title'];
											
											echo " <td><a href='../post.php?p_id=$comment_post_id'>$post_title</a></td>";
										}
										
										echo " <td>$comment_status</td>";
										echo " <td>$comment_content</td>";
										echo " <td>$comment_date</td>";
										echo " <td><a href='comments.php?approve={$comment_id}'>Approve</td>";
										echo " <td><a href='comments.php?unapprove={$comment_id}'>Unapprove</td>";
										echo " <td><a href='comments.php?delete={$comment_id}'>Deleted</td>";
										echo "<tr>";

                        			} 
                        			?>

								
                        		</tbody>
                        	</table>

<?php

if(isset($_GET['approve'])){
	$approve_comment_id = $_GET['approve'];
	$query_approve	= "UPDATE comments SET comment_status = 'approve' WHERE comment_id = {$approve_comment_id}";
	$result_approve	= mysqli_query($connection, $query_approve);

	if(!$result_approve)
	{
		die("Approve Query Failed" . mysqli_error($connection));
	}
	header("Location: comments.php");
}

if(isset($_GET['unapprove'])){
	$approve_comment_id = $_GET['unapprove'];
	$query_unapprove	= "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = {$approve_comment_id}";
	$result_unapprove	= mysqli_query($connection, $query_unapprove);

	if(!$result_unapprove)
	{
		die("Unapprove Query Failed" . mysqli_error($connection));
	}
	header("Location: comments.php");
}


if(isset($_GET['delete'])){
	$delete_comment_id = $_GET['delete'];
	$query_delete 	= "DELETE FROM comments WHERE comment_id = {$delete_comment_id}";
	$result_delete 	= mysqli_query($connection, $query_delete);

	if(!$result_delete)
	{
		die("Deleted Query Failed" . mysqli_error($connection));
	}
	header("Location: comments.php");
}
?>