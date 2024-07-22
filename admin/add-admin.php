<?php include('partials/menu.php'); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])) //Checking whether the Session is Set of Not
            {
                echo $_SESSION['add']; //Display Session Message
                unset($_SESSION['add']); //Removing Session Message
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>User Name: </td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>



<?php include('partials/footer.php'); ?>

<?php 

    //process the value from form and save it in DataBase


    //check whether the submit buttom is clicked or not


    if(isset($_POST['submit']))
    {
        //button clicked
        //echo "Button Clicked";

        //1.Get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5; 

        
        
        //2.SQL Query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
            ";

        
        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //deta inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class = 'success'>Admin Added Successfully</div>";

            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        else
        {
            //failed to insert data
            //echo "Failed to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class = 'error'>Failed to Add Admin</div>";

            //Redirect Page to add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    

?>