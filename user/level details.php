<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data for secondary education
    $secondarySchool = $_POST['secondary_school'];
    $secondaryBoard = $_POST['secondary_board'];
    $secondaryPercentage = $_POST['secondary_percentage'];
    $secondaryYearOfPassing = $_POST['secondary_passing_year'];

    // Process the form data for higher secondary education
    $higherSecondarySchool = $_POST['higher_secondary_school'];
    $higherSecondaryBoard = $_POST['higher_secondary_board'];
    $higherSecondaryPercentage = $_POST['higher_secondary_percentage'];
    $higherSecondaryYearOfPassing = $_POST['higher_secondary_passing_year'];

    // Perform further processing or database insertion here
    // ...

    // Display a success message
    echo '<script>alert("Education details submitted successfully.")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Education Details Form</title>
</head>

<body>
    <h2>Education Details Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3>Secondary Education</h3>
        <div>
            <label for="secondary_school">School Name:</label>
            <input type="text" name="secondary_school" class="form-control" required>
        </div>

        <div>
            <label for="secondary_board">Board:</label>
            <input type="text" name="secondary_board" class="form-control" required>
        </div>

        <div>
            <label for="secondary_percentage">Percentage:</label>
            <input type="number" name="secondary_percentage" class="form-control" required>
        </div>

        <div>
            <label for="secondary_passing_year">Year of Passing:</label>
            <input type="number" name="secondary_passing_year" class="form-control" required>
        </div>

        <h3>Higher Secondary Education</h3>
        <div>
            <label for="higher_secondary_school">School Name:</label>
            <input type="text" name="higher_secondary_school" class="form-control" required>
        </div>

        <div>
            <label for="higher_secondary_board">Board:</label>
            <input type="text" name="higher_secondary_board" class="form-control" required>
        </div>

        <div>
            <label for="higher_secondary_percentage">Percentage:</label>
            <input type="number" name="higher_secondary_percentage" class="form-control" required>
        </div>

        <div>
            <label for="higher_secondary_passing_year">Year of Passing:</label>
            <input type="number" name="higher_secondary_passing_year" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>


</html>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include_once('includes/footer.php'); ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
