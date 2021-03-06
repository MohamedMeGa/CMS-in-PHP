
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
                            <small><?php echo $_SESSION['user_firstname'] ?></small>
                            
                            <small>Today date: <?php echo date('d-m-y'); ?></small>
        
        
                        </h1>

                        <?php
                        	if (isset($_GET['source'])) {
                        	 	$source = $_GET['source'];
                        	 }else{
                        	 	$source = '';
                        	 }

                        	 switch ($source) {
                        	 	case 'add_post':
                        	 		include "includes/add_post.php";
                        	 		break;
                        	 		
                                case 'edit_post' :
                                    include "includes/edit_post.php";
                                    break;
                                    
                        	 	default:
                        	 		include "includes/view_all_posts.php";
                        	 		break;
                        	 }
                        ?>
                        	

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