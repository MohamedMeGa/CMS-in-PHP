
<form action="" method="post">
                        		<div class="form-group">
                        			<label for="cat-title"> Category Title</label>
                        	<?php 
                        		if(isset($_GET['edit']))
                        		{
                        			$cat_id = $_GET['edit'];
                        			$query = "SELECT * FROM categories WHERE cat_id = $cat_id";
									$result = mysqli_query($connection, $query);
									while($row = mysqli_fetch_assoc($result))
									{
										$cat_id = $row['cat_id'];
										$cat_title = $row['cat_title']; ?>

										<input type="text" name="cat_title"	value="<?php if(isset($cat_id)){echo $cat_title; }?>" class="form-control">

										<?php
									}
                        		}
                        	?>
                        	<?php
                        		if (isset($_POST['edit_category'])) {
                        			$cat_title = $_POST['cat_title'];
                        			$query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
                        			$result = mysqli_query($connection, $query);
                        			if (!$result) {
                        				die("Updated QUERY FAILED" . mysqli_error($connection));
                        			}
                        		}
                        	?>
                        		</div>
                        		<div class="form-group">
                        			<input type="submit" name="edit_category" class="btn btn-primary" value="Update Category">
                        		</div>
                        	</form>