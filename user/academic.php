<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $registration_number = $_POST['registration_number'];

    // Validate required fields
    if (empty($student_name) || empty($registration_number)) {
        echo '<script>alert("Student Name and Registration Number are required.")</script>';
    } else {
        try {
            // Loop through each semester to get subjects and grades
            for ($semester = 1; $semester <= 4; $semester++) {
                $subject = $_POST['subject_' . $semester];
                $grade = $_POST['grade_' . $semester];

                // Insert data into the database
                $sql = "INSERT INTO semester_grades (student_name, registration_number, semester, subject, grade) 
                        VALUES (:student_name, :registration_number, :semester, :subject, :grade)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':student_name', $student_name, PDO::PARAM_STR);
                $query->bindParam(':registration_number', $registration_number, PDO::PARAM_STR);
                $query->bindParam(':semester', $semester, PDO::PARAM_INT);
                $query->bindParam(':subject', $subject, PDO::PARAM_STR);
                $query->bindParam(':grade', $grade, PDO::PARAM_STR);

                $query->execute();
            }

            echo '<script>alert("Semester grades added successfully.")</script>';
            echo "<script>window.location.href ='semester_grades.php'</script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Profile || Add Semester Grades</title>
    <!-- Include your CSS and other necessary stylesheets here -->
</head>

<body>
    <div class="container-scroller">
        <!-- Your existing HTML structure here -->

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
    <label for="exampleInputName1">Student Name</label>
    <input type="text" name="student_name" value="" class="form-control" required>
</div>
<div class="form-group">
    <label for="exampleInputName1">Register_no</label>
    <input type="text" name="" value="" class="form-control" required>
</div

            <?php for ($semester = 1; $semester <= 4; $semester++) : ?>
                <h3>Semester <?php echo $semester; ?> Grades</h3>

                 <div class="form-group">
                                            <label for="exampleInputName1">Subjectcode</label>
                                            <select type="text" name="subjectcode" value="" class="form-control" required='true'>
                                            <option value="">Subjectcode</option>
                                            <option value="MA253">MA253</option>
                                            <option value="CA201">CA201</option>
                                            <option value="CA202">CA202</option>
                                            <option value="CA203">CA203</option>
                                            <option value="CA204">CA204</option>
                                            <option value="CA205">CA205</option>
                                            <option value="CA206">CA206</option>
                                            <option value="CA207">CA207</option>
                                            <option value="CA208">CA208</option>
                                            <option value="CA209">CA209</option>
                                            <option value="CA210">CA210</option>
                                            <option value="CA211">CA211</option>
                                            <option value="CAZ02">CAZ02</option>
                                            <option value="CAZ07">CAZ07</option>
                                            <option value="CA212">CA212</option>
                                            <option value="CA213">CA213</option>
                                            <option value="CAZ12">CAZ12</option>
                                            <option value="CAZ14">CAZ14</option>
                                            <option value="CAZ17">CAZ17</option>
                                            <option value="CA214">CA214</option>
                                            <option value="CA215">CA215</option>
                                            <option value="CA216">CA216</option>
                                           

        <!-- Add more options as needed -->
    </select>
                                        </div>

                <div class="form-group">
                    <label for="subject_name_<?php echo $semester; ?>">Subject Name</label>
                    <input type="text" name="subject_name_<?php echo $semester; ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="faculty_name_<?php echo $semester; ?>">Name of Faculty</label>
                    <input type="text" name="faculty_name_<?php echo $semester; ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="exam_grade_<?php echo $semester; ?>">Exam Grade</label>
                    <select name="exam_grade_<?php echo $semester; ?>" class="form-control" required>
                        <!-- Add your options for exam grades here -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="grade_when_passed_<?php echo $semester; ?>">Grade When Passed</label>
                    <select name="grade_when_passed_<?php echo $semester; ?>" class="form-control" required>
                        <!-- Add your options for grades when passed here -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="attempts_<?php echo $semester; ?>">Number of Attempts</label>
                    <input type="text" name="attempts_<?php echo $semester; ?>" class="form-control" required>
                </div>

            <?php endfor; ?>

            <button type="submit" name="submit" class="btn btn-primary">Add Semester Grades</button>
        </form>

        <!-- Your existing HTML structure here -->
    </div>
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
