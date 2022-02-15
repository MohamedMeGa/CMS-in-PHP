<?php 
if(isset($_POST['create_post'])){
	$post_title			= $_POST['post_title'];
	$post_category_id	= $_POST['post_category_id'];
	$post_author		= $_POST['post_author'];
	$post_status		= $_POST['post_status'];
	$post_image			= $_FILES['post_image']['name'];
	$post_image_tmp		= $_FILES['post_image']['tmp_name'];
	$post_tags			= $_POST['post_tags'];
	$post_content		= $_POST['post_content'];
	$post_date			= date('d-m-y');


	move_uploaded_file($post_image_tmp, "../images/$post_image");

	$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_data, post_image, post_content, post_tags,  post_status)";
	$query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("QUERY FAILED" . mysqli_error($connection));
	}
	$p_id = mysqli_insert_id($connection);
	echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$p_id}'>View post</a> or <a href='posts.php'>Edit More Posts</a></p>";
}
?>








<form action="" method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label for="title">Post Title</label>
		
		<input type="text" class="form-control" name="post_title">
	</div>

	<div class="form-group">
		<label for="post">Post Category Title</label>
		<select name="post_category_id" class="form-control">
			<?php

			$query = "SELECT * FROM categories";
			$result = mysqli_query($connection, $query);
			while($row = mysqli_fetch_assoc($result))
			{
				echo " <option value='{$row['cat_id']}'>{$row['cat_title']}</option>";
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="post_author">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<!-- <input type="text" class="form-control" name="post_status"> -->
		<select class="form-control" name="post_status">
			<option value="denied">Post Status</option>
			<option class="active">Active</option>
			<option value="denied">Denied</option>
		</select>
	</div>

	<div class="form-group">
		<label for="post_tags">Post image</label>
		<input type="file" class="form-control" name="post_image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content", id="body" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>

</form>