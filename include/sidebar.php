<div class="col-md-4">

    <?php
    // include "include/db.php";

    ?>

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Login Well -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="include/login.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter UserName">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            <span class="input-group-btn">
                                <button name="login" class="btn btn-primary" type="submit">Login</button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($connection, $query);?>
                                
                            <ul class="list-unstyled">
                            <?php while($row = mysqli_fetch_assoc($result))
                                {?>
                                <li><a href="category.php?cat_id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></a>
                                </li>
                            <?php }?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php"; ?>
                

            </div>