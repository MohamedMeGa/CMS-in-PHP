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

                if (isset($_POST['submit'])) {
            
                    $search = $_POST['search'];
                    $query  = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $result = mysqli_query($connection, $query);

                    if(!$result){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($result);
                    if($count == 0){
                        echo "No Result";
                    }else {
                        echo $search;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $post_title     = $row['post_title'];
                            $post_author    = $row['post_author'];
                            $post_data      = $row['post_title'];
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
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        

                        <hr>

                        <?php
                    }
                }

                }?>



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