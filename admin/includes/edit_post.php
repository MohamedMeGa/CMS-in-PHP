
<?php 
if(isset($_GET['edit_id'])){
	$p_id 		= $_GET['edit_id'];}
	$query 		= "SELECT * FROM posts WHERE post_id = {$p_id}";
     $result 	= mysqli_query($connection, $query);
    while($row 	= mysqli_fetch_assoc($result))
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
        $post_content	= $row['post_content'];
	}
	


if(isset($_POST['submit']))
{
	// $pos_id				= $_POST['post_id'];
	$post_title			= $_POST['post_title'];
	$post_category_id	= $_POST['category_id'];
	$post_author		= $_POST['post_author'];
	$post_status		= $_POST['post_status'];
	$post_image			= $_FILES['post_image']['name'];
	$post_image_tmp		= $_FILES['post_image']['tmp_name'];
	$post_tags			= $_POST['post_tags'];
	$post_content		= $_POST['post_content'];


	move_uploaded_file($post_image_tmp, "../images/$post_image");

	$query = "UPDATE posts SET ";
	$query .= "post_title= '{$post_title}', ";
	$query .= "post_category_id= {$post_category_id}, ";
	$query .= "post_author= '{$post_author}', ";
	$query .= "post_status= '{$post_status}', ";
	$query .= "post_image= '{$post_image}', ";
	$query .= "post_tags= '{$post_tags}', ";
	$query .= "post_content= '{$post_content}', ";
	$query .= "post_data = now() ";
	$query .= "WHERE post_id = {$p_id}";
	

	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("QUERY FAILED " . mysqli_error($connection));
	}

	
}
?>







<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
	</div>

	<div class="form-group">
		<label for="post">Post Category Id</label>
		<select name="category_id" id="">
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
		<input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="post_status" id="">
			<option value="<?php echo $post_status; ?>"><?php echo $post_status;?></option>
			<?php
			if ($post_status == 'active') {
			 	echo "<option value='denied'>denied</option>";
			 } else{
			 	echo "<option value='active'>actve</option>";
			 }
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="post_tags">Post image</label>
		<img src="<?php echo "../images/" . $post_image; ?>" alt="Post Image" width="100">
		<input type="file" class="form-control" name="post_image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="body" cols="30" rows="10" ><?php echo $post_content; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Edit Post">
	</div>

</form>