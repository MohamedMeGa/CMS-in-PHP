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
                $query = "SELECT * FROM posts";
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($result))
                {
                    $post_id        = $row['post_id'];
                    $post_title     = $row['post_title'];
                    $post_author    = $row['post_author'];
                    $post_data      = $row['post_data'];
                    $post_image     = $row['post_image'];
                    $post_content   = $row['post_content'];
                    $post_status    = $row['post_status'];
                    if($post_status == 'active'){
                
                ?>
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ;?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author ;?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_data ;?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image ;?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                

                <hr>
                <?php }}?>



                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "include/footer.php"; ?>