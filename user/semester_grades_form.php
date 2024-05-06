<?php
// Include your database connection file
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $registration_number = $_POST['registration_number'];

    // Loop through each semester to get subjects and grades
    for ($semester = 1; $semester <= 4; $semester++) {
        for ($subjectNumber = 1; $subjectNumber <= 8; $subjectNumber++) {
            $subject = $_POST['subject_' . $semester . '_' . $subjectNumber];
            $subject_code = $_POST['subject_code_' . $semester . '_' . $subjectNumber];
            $faculty = $_POST['faculty_' . $semester . '_' . $subjectNumber];
            $attempts = $_POST['attempts_' . $semester . '_' . $subjectNumber];
            $grade = $_POST['grade_' . $semester . '_' . $subjectNumber];

            // Insert data into the database
            $sql = "INSERT INTO semester_grades 
                    (student_name, registration_number, semester, subject, subject_code, faculty, attempts, grade) 
                    VALUES (:student_name, :registration_number, :semester, :subject, :subject_code, :faculty, :attempts, :grade)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':student_name', $student_name, PDO::PARAM_STR);
            $query->bindParam(':registration_number', $registration_number, PDO::PARAM_STR);
            $query->bindParam(':semester', $semester, PDO::PARAM_INT);
            $query->bindParam(':subject', $subject, PDO::PARAM_STR);
            $query->bindParam(':subject_code', $subject_code, PDO::PARAM_STR);
            $query->bindParam(':faculty', $faculty, PDO::PARAM_STR);
            $query->bindParam(':attempts', $attempts, PDO::PARAM_INT);
            $query->bindParam(':grade', $grade, PDO::PARAM_STR);

            $query->execute();
        }
    }

    // Check if the data is inserted successfully
    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {
        echo '<script>alert("Semester grades added successfully.")</script>';
        echo "<script>window.location.href ='semester_grades.php'</script>";
    } 
}
?>


<!-- HTML starts here -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Profile || Add personal info</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include_once('includes/header.php'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Add Personal Information </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Education info</li>
                            </ol>
                        </nav>
                    </div>
                    
                    <h2>4 Semester Grades Form</h2>
                    <form class="forms" method="post">
    <label for="student_name">Student Name:</label>
    <input type="text" name="student_name" required>

    <label for="registration_number">Registration Number:</label>
    <input type="text" name="registration_number" required>

    <?php for ($semester = 1; $semester <= 4; $semester++) : ?>
        <h3>Semester <?php echo $semester; ?></h3>
        <?php for ($subjectNumber = 1; $subjectNumber <= 8; $subjectNumber++) : ?>
            <div class="subject-section">
                <label for="subject_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>">Subject <?php echo $subjectNumber; ?>:</label>
                <input type="text" name="subject_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>" >

                <label for="subject_code_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>">Subject Code <?php echo $subjectNumber; ?>:</label>
                <input type="text" name="subject_code_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>" >

                <label for="faculty_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>">Faculty Name <?php echo $subjectNumber; ?>:</label>
                <input type="text" name="faculty_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>" >

                <label for="attempts_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>">Number of Attempts <?php echo $subjectNumber; ?>:</label>
                <input type="number" name="attempts_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>" >

                <label for="grade_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>">Grade for Subject <?php echo $subjectNumber; ?>:</label>
                <select name="grade_<?php echo $semester; ?>_<?php echo $subjectNumber; ?>" >
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>
        <?php endfor; ?>
    <?php endfor; ?>

    <button type="submit" name="submit">Submit</button>
</form>

                       
                </div>
            </div>
        </div>
    </div>

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
<style>

body {
        font-family: Arial, sans-serif;
        margin: auto;
    }

    form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    h2, h3 {
        color: #333;
    }

    .subject-section {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 10px 15px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>