<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <!-- Add Category Form Starts -->
         <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>

            </table>

         </form>
        <!-- Add Category Form Ends -->

        <?php

            //check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. Get the value from Category Form
                $title = $_POST['title'];

                //for radio input type we need to check whether the button is selected or not
                if(isset($_POST['featured']))
                {
                    //Get the value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    //Set the default value
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //2. Create SQL Query to Insert Category into Database
                $sql = "INSERT INTO tbl_category SET
                    title = '$title',
                    featured = '$featured',
                    active = '$active'
                ";

                //3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql) or die(mysqli_error());

            }
        ?>
    </div>
</div>


<?php include('partials/footer.php'); ?>