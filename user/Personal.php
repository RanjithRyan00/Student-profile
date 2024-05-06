<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $Admissioncategory = $_POST['Admissioncategory'];
        $region = $_POST['region'];
        $community = $_POST['community'];
        $Specialcategory = $_POST['Specialcategory'];
        $Enrollmentno = $_POST['Enrollmentno'];
        $Registerno = $_POST['Registerno'];
        $DOB = $_POST['DOB'];
        $MotherTongue = $_POST['MotherTongue'];
        $Bloodgroup = $_POST['Bloodgroup'];
        $DH = $_POST['DH'];
        $Parentname = $_POST['Parentname'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];
        $Mobile = $_POST['Mobile'];
        $Paddress = $_POST['Paddress'];

        $sql = "INSERT INTO tbpersonal (name, course, Admission_category, region, community, Special_category, Enrollment_no, Register_no, DOB, Mother_Tongue, Blood_group, DH, Parent_name, Address, Email, Mobile, Paddress) VALUES (:name, :course, :Admissioncategory, :region, :community, :Specialcategory, :Enrollmentno, :Registerno, :DOB, :MotherTongue, :Bloodgroup, :DH, :Parentname, :Address, :Email, :Mobile, :Paddress)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':course', $course, PDO::PARAM_STR);
        $query->bindParam(':Admissioncategory', $Admissioncategory, PDO::PARAM_STR);
        $query->bindParam(':region', $region, PDO::PARAM_STR);
        $query->bindParam(':community', $community, PDO::PARAM_STR);
        $query->bindParam(':Specialcategory', $Specialcategory, PDO::PARAM_STR);
        $query->bindParam(':Enrollmentno', $Enrollmentno, PDO::PARAM_STR);
        $query->bindParam(':Registerno', $Registerno, PDO::PARAM_STR);
        $query->bindParam(':DOB', $DOB, PDO::PARAM_STR);
        $query->bindParam(':MotherTongue', $MotherTongue, PDO::PARAM_STR);
        $query->bindParam(':Bloodgroup', $Bloodgroup, PDO::PARAM_STR);
        $query->bindParam(':DH', $DH, PDO::PARAM_STR);
        $query->bindParam(':Parentname', $Parentname, PDO::PARAM_STR);
        $query->bindParam(':Address', $Address, PDO::PARAM_STR);
        $query->bindParam(':Email', $Email, PDO::PARAM_STR);
        $query->bindParam(':Mobile', $Mobile, PDO::PARAM_STR);
        $query->bindParam(':Paddress', $Paddress, PDO::PARAM_STR);
        $query->execute();
        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Personal info has been added.")</script>';
            echo "<script>window.location.href ='Personal.php'</script>";
        } 
    }
?>
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
    <link rel="stylesheet" href="css/style.css" />

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
                                <li class="breadcrumb-item active" aria-current="page">Add Personal info</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align: center;">Add Personal Information</h4>
                                    <form class="forms-sample" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Student Name</label>
                                            <input type="text" name="name" value="" class="form-control" required='true'>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputName1">Course</label>
                                          <select name="course"  class="form-control" required='true'>
                                            <option value="">Select Class</option>
                                   <option value="btech">btech</option>
                                        <option value="MCA">MCA</option>
                                    <option value="Mtech">Mtech</option>
                                           </select>
                                          </div>
                      <div> 
                      <div class="form-group">
                        <label for="exampleInputName1">Admission Category</label>
                        <select name="Admissioncategory" value="" class="form-control" required='true'>
                          <option value="">Choose category</option>
                          <option value="PY">PY</option>
                          <option value="OS">OS</option>
                          <option value="PIO">PIO</option>
                          <option value="NRI">NRI</option>
                          <option value="CIGW">CIGW</option>
                          <option value="FN">FN</option>
                        </select>
          </div>

                      
                      <div class="form-group">
    <label for="exampleInputName1">Region</label>
    <select name="region" class="form-control" required='true'>
        <option value="">Select Region</option>
        <option value="PY">PY</option>
        <option value="KA">KA</option>
        <option value="MA">MA</option>
        <option value="YA">YA</option>
        <!-- Add more options as needed -->
    </select>
</div>

                     
                      <div class="form-group">
                        <label for="exampleInputName1">community</label>
                        <select name="community" class="form-control" required='true'>
        <option value="">Select Community</option>
        <option value="GE">GE</option>
        <option value="OBC">OBC</option>
        <option value="MBC">MBC</option>
        <option value="SC">SC</option>
        <!-- Add more options as needed -->
    </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Special category</label>
                        <input type="text" name="Specialcategory" value="" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Enrollment Number</label>
                        <input type="text" name="Enrollmentno" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Register Number</label>
                        <input type="text" name="Registerno" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Date of Birth</label>
                        <input type="date" name="DOB" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Mother Tongue</label>
                        <input type="text" name="MotherTongue" value="" class="form-control" required='true' >
                      </div>
                      <div class="form-group">
    <label for="exampleInputName1">Blood Group</label>
    <select name="Bloodgroup" class="form-control" required='true'>
        <option value="">Select Blood Group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </select>
</div>


<div class="form-group">
    <label>Hosteller/Day Scholar</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="DH" id="hosteller" value="Hosteller" required='true'>
        <label class="form-check-label" for="hosteller">Hosteller</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="DH" id="day_scholar" value="Day Scholar" required='true'>
        <label class="form-check-label" for="day_scholar">Day Scholar</label>
    </div>
</div>

                      <div class="form-group">
                        <label for="exampleInputName1">Parent Name</label>
                        <input type="text" name="Parentname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <input type="text" name="Address" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="Email" name="Email" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Mobile</label>
                        <input type="text" name="Mobile" value="" class="form-control" required='true'maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Permanent Address</label>
                        <input type="text" name="Paddress" value="" class="form-control" required='true'>
                      </div>
                    
                                        
                                        <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $selectedFamilyMember = $_POST['family_member'];

    // Perform further processing or database insertion here
    // ...

    // Display a success message
    echo '<script>alert("Family details submitted successfully. Selected family member: ' . htmlspecialchars($selectedFamilyMember) . '")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Family Details Form</title>
</head>

<body>
    <h2>Family Details Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td><label for="family_member">Select Family Member:</label></td>
                <td>
                    <select name="family_member" class="form-control" required>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <!-- Add more family member options as needed -->
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="num_siblings">Number of Siblings:</label></td>
                <td><input type="number" name="num_siblings" class="form-control" required></td>
            </tr>
        </table>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

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
