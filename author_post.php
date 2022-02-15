<?php include "include/header.php"; ?>

    <!-- Navigation -->
    <?php include "include/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                if(isset($_GET['p_id'])){
                    $post_id = $_GET['p_id'];
                    $author = $_GET['author'];
                    $query = "SELECT * FROM posts WHERE post_author = '{$author}'";
                    $result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $post_title     = $row['post_title'];
                        $post_author    = $row['post_author'];
                        $post_data      = $row['post_data'];
                        $post_image     = $row['post_image'];
                        $post_content   = $row['post_content'];
                
                ?>
                <h2>
                    <a href="#"><?php echo $post_title ;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_data ;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ;?>" alt="">
                <hr>
                <p><?php echo $post_content ;?></p>
                
                

                <hr>
                

                <!-- Blog Comments -->

                <?php
                    if (isset($_POST['create_comment'])) {

                        $comment_author     = $_POST['comment_author'];
                        $comment_email      = $_POST['comment_email'];
                        $comment_content    = $_POST['comment_content'];
                        $comment_post_id    = $_GET['p_id'];
                        if(!empty($comment_author) && !empty(!comment_content) && !empty($comment_email)){
                            $query = "INSERT INTO comments(comment_author, comment_email, comment_content, comment_post_id, comment_status, comment_date) ";

                            $query .= "VALUES ('{$comment_author}', '{$comment_email}', '{$comment_content}', $comment_post_id, 'unapprove', now())";

                            $result = mysqli_query($connection, $query);
                            if(!$result){
                                die("Comment Failed Query" . mysqli_error($connection));
                            }

                           $query_count = "UPDATE posts SET post_comment_count = post_comment_count+1 ";
                            $query_count .= "WHERE post_id = $comment_post_id";
                            $result_query = mysqli_query($connection, $query_count);
                        }else{
                            echo "<script> alert('Field Can not be Empty')</script>";}
                    }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>
                <?php
                    }
                }
                ?>
                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">

                    <?php
                        $comment_query  = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
                        $comment_query .= " AND comment_status = 'approve' ORDER BY comment_id DESC";
                        $comment_result = mysqli_query($connection, $comment_query);
                        while($row = mysqli_fetch_assoc($comment_result))
                        {

                            $comment_author     = $row['comment_author'];
                            $comment_content   = $row['comment_content'];
                            $comment_date       = $row['comment_date'];


                    ?>
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small>August <?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                <hr>
                <?php } ?>



            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "include/footer.php"; ?>