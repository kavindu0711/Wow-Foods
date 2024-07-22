<?php include('partials/menu.php'); ?>

<!---- Main Content Section Start ---->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <br>

        <?php 
        if(isset($_SESSION['add'])) // Checking whether the Session is set or not
        {
            echo $_SESSION['add']; // Display Session Message
            unset($_SESSION['add']); // Removing Session Message
        }

        if(isset($_SESSION['delete'])) // Checking whether the Session is set or not
        {
            echo $_SESSION['delete']; // Display Session Message
            unset($_SESSION['delete']); // Removing Session Message
        }

        if(isset($_SESSION['update'])) // Checking whether the Session is set or not
        {
            echo $_SESSION['update']; // Display Session Message
            unset($_SESSION['update']); // Removing Session Message
        }

        if(isset($_SESSION['user-not-found'])) // Checking whether the Session is set or not
        {
            echo $_SESSION['user-not-found']; // Display Session Message
            unset($_SESSION['user-not-found']); // Removing Session Message
        }

        if(isset($_SESSION['pwd-not-match'])) // Checking whether the Session is set or not
        {
            echo $_SESSION['pwd-not-match']; // Display Session Message
            unset($_SESSION['pwd-not-match']); // Removing Session Message
        }

        if(isset($_SESSION['change-pwd'])) // Checking whether the Session is set or not
        {
            echo $_SESSION['change-pwd']; // Display Session Message
            unset($_SESSION['change-pwd']); // Removing Session Message
        }
        ?>

        <br><br>
        
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br><br><br>
        
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            // Query to Get all Admin
            $sql = "SELECT * FROM tbl_admin";

            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // Check whether the Query is Executed or not
            if($res == TRUE)
            {
                // Count Rows to check whether we have data in database or not
                $count = mysqli_num_rows($res); // Function to get all the rows in database

                $sn = 1; // Create a variable and assign the value

                // Check the number of rows
                if($count > 0)
                {
                    // We have data in database
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        // Using While loop to get all the data from database.
                        // And while loop will run as long as we have data in database

                        // Get individual Data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        // Display the Values in our Table
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>

                            </td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    // We do not have data in database
                    ?>
                    <tr>
                        <td colspan="4">No Admins Added Yet.</td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        
    </div>
</div>
<!---- Main Content Section Ends ---->

<?php include('partials/footer.php'); ?>
