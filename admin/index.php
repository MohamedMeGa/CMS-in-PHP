
    <?php include "includes/header.php"; ?>



    <div id="wrapper">

        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                              
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $query_post = "SELECT * FROM posts";
                                            $result_post = mysqli_query($connection, $query_post);
                                            $post_num = mysqli_num_rows($result_post);
                                            echo "<div class='huge'>{$post_num}</div>"; 
                                        ?>
                                  
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <?php
                                            $query_comments = "SELECT * FROM comments ";
                                            $result_comments  = mysqli_query($connection, $query_comments);
                                            $comments_num = mysqli_num_rows($result_comments);
                                            echo "<div class='huge'>{$comments_num}</div>"; 
                                        ?>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php
                                            $query_users = "SELECT * FROM users ";
                                            $result_users  = mysqli_query($connection, $query_users);
                                            $users_num = mysqli_num_rows($result_users);
                                            echo "<div class='huge'>{$users_num}</div>"; 
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $query_category     = "SELECT * FROM categories ";
                                            $result_category    = mysqli_query($connection, $query_category);
                                            $category_num       = mysqli_num_rows($result_category);
                                            echo "<div class='huge'>{$category_num}</div>"; 
                                        ?>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                $query_post_active = "SELECT * FROM posts WHERE post_status = 'active'";
                $result_post_active = mysqli_query($connection, $query_post_active);
                $active_post_num = mysqli_num_rows($result_post_active);

                $query_post_denied = "SELECT * FROM posts WHERE post_status = 'denied'";
                $result_post_denied = mysqli_query($connection, $query_post_denied);
                $denied_post_num = mysqli_num_rows($result_post_denied);
                
                ?>

                <div class="row">
                     <script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                              /*['Year', 'Sales', 'Expenses', 'Profit'],
                              ['2014', 1000, 400, 200],
                              ['2015', 1170, 460, 250],
                              ['2016', 660, 1120, 300],
                              ['2017', 1030, 540, 350]*/
                              <?php 
                              $element_text = ['Posts', 'Active Posts', 'Denied Posts', 'Comments', 'Users', 'Categories'];
                              $element_count = [$post_num, $active_post_num, $denied_post_num, $comments_num, $users_num, $category_num];
                              for($i=0; $i<6; $i++)
                              {
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                              }
                              ?>
                            ]);

                            var options = {
                              chart: {
                                title: 'Company Performance',
                                subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                              }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                          }
                        </script>
                        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>



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

