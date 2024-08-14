<?php include ('partials/menu.php'); ?>


        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Category</h1>

                <br>

            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Displaying Session Message
                unset($_SESSION['add']); //Removing Session Message
            }

            
            ?>

                <br><br><br>

                    <!-- Button to Add Category-->
            
        <a href = "add-category.php" class="btn-primary">Add Category</a>

                    <br><br><br>
                    
                    
                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Actions</th>
                        </tr>

                        <tr>
                            <td>1.</td>
                            <td>John Doe</td>
                            <td>john01</td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td> 
                        </tr>
                        
                        <tr>
                            <td>2.</td>
                            <td>John Doe</td>
                            <td>john01</td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td> 
                        </tr>

                        <tr>
                            <td>3.</td>
                            <td>John Doe</td>
                            <td>john01</td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td> 
                        </tr>
                    </table>
            </div>
        </div>



    
<?php include ('partials/footer.php'); ?>