<?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>


    <!-- Navigation -->
    <?php  include "include/navigation.php"; ?>
    


    <?php 

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email    = $_POST['email'];

        if(!empty($username) && !empty($password) && !empty($email)){
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            $email    = mysqli_real_escape_string($connection, $email);

            $query  = "SELECT randSalt FROM users";
            $result = mysqli_query($connection, $query);
            // $row    = mysqli_fetch_array($result);
            while($low = mysqli_fetch_assoc($result)){
                $salt   = $low['randSalt'];
            }

            $password = crypt($password,  $salt);

            if(!$result){
                die("REGISTER QUERY FAILED" . mysqli_error($connection));
            }

            $query_ek = "INSERT INTO users (username, user_password, user_email, user_role) VALUES ('{$username}', '{$password}', '{$email}', 'admin')";
            $result_ek = mysqli_query($connection, $query_ek);
            if (!$result_ek) {
                die("INSERTION QUERY FAILED" . mysqli_error($connection));
            }
            $message = "Your Registeriation has been sbmitted";

        }else{
            $message = "Sorry, There is Empty Field";
        }

    }else{
        $message="";
    }
    ?>
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registeration.php" method="post" id="login-form" autocomplete="off">
                        <h6 class="text-center"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
