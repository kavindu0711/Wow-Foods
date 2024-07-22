<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Admin Login</h1>
            
            <p class="text-center">Enter your username and password to access the admin panel.</p>
            <br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }

                ?>
            <br><br>

            <!--login form starts here -->

            <form action="login.php" method="post" class="text-center">
                username: <br>
                <input type="text" name="username" placeholder="Enter username" /> <br><br>
                password: <br>
                <input type="password" name="password" placeholder="Enter password" /> <br><br>

                <input type="submit" name="submit" value="login" class="btn-primary" />
            </form>
        </div>

            <!--login form ends here -->
    </body>

</html>

<?php
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //echo "Button clicked";
        //1. Get the data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User available and login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it
            
            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not available and login fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>
