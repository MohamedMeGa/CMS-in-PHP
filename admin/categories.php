
    <?php include "includes/header.php"; ?>
    <?php include "function.php"; ?>
    <?php ob_start(); ?>

    <div id="wrapper">

        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Subheading</small>
                        </h1>

                        <div class="col-xs-6">
                        	<?php 
                        		insert_category();
                        	?>
                        	<form action="" method="post">
                        		<div class="form-group">
                        			<label for="cat-title"> Category Title</label>
                        			<input type="text" name="cat_title" class="form-control">
                        		</div>
                        		<div class="form-group">
                        			<input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                        		</div>
                        	</form>
                        </div>

                        <div class="col-xs-6">
                        	<?php
                        		if (isset($_GET['edit'])) {
                        		 	include "includes/edit_category.php";
                        		 } 
                        	?>
                        </div>

                        <div class="col-xs-6">
                        	<table class="table table-bordered">
                        		<thead>
                        			<tr>
                        				<th>ID</th>
                        				<th>Category Title</th>
                        				<th>Action</th>
                        			</tr>
                        		</thead>
                        		<tbody>

								<?php findAllCategory(); ?>
                        			<?php
                        			DeletePost();
                        			?>
                        		</tbody>
                        	</table>
                        </div>

                       <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

 <?php include "includes/footer.php"; ?>