<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $cregisterno = $_POST['cregisterno'];
    $schoolname = $_POST['schoolname'];
    $board = $_POST['board'];
    $medium = $_POST['medium'];
    $totalmarks = $_POST['totalmarks'];
    $yearofpassing = $_POST['yearofpassing'];
    $lan1 = $_POST['lan1'];
    $lan2 = $_POST['lan2'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sub3 = $_POST['sub3'];
    $sub4 = $_POST['sub4'];
    $nameofinstitution1 = $_POST['nameofinstitution1'];
    $tmarks1 = $_POST['tmarks1'];
    $yearofpassing2 = $_POST['yearofpassing2'];
    $category = $_POST['category'];
    $Overallmeritrank = $_POST['Overallmeritrank'];
    $Categoryrank = $_POST['Categoryrank'];
    $JEEmarks = $_POST['JEEmarks'];
    $OverallMeritRank1 = $_POST['OverallMeritRank1'];
    $Diplomadegree = $_POST['Diplomadegree'];
    $nameofinstitution = $_POST['nameofinstitution'];
    $tmarks = $_POST['tmarks'];
    $yearofpassing1 = $_POST['yearofpassing1'];

    $sql = "INSERT INTO tbleveldetails ( cregisterno, schoolname, board, medium, totalmarks, yearofpassing, lan1, lan2, sub1, sub2, sub3, sub4, nameofinstitution1, tmarks1, yearofpassing2, category, Overallmeritrank, Categoryrank, JEEmarks, OverallMeritRank1, Diplomadegree, nameofinstitution, tmarks, yearofpassing1)
    VALUES (:cregisterno, :schoolname, :board, :medium, :totalmarks, :yearofpassing, :lan1, :lan2, :sub1, :sub2, :sub3, :sub4, :nameofinstitution1, :tmarks1, :yearofpassing2, :category, :Overallmeritrank, :Categoryrank, :JEEmarks, :OverallMeritRank1, :Diplomadegree, :nameofinstitution, :tmarks, :yearofpassing1)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':cregisterno', $cregisterno, PDO::PARAM_STR);
    $query->bindParam(':schoolname', $schoolname, PDO::PARAM_STR);
    $query->bindParam(':board', $board, PDO::PARAM_STR);
    $query->bindParam(':medium', $medium, PDO::PARAM_STR);
    $query->bindParam(':totalmarks', $totalmarks, PDO::PARAM_STR);
    $query->bindParam(':yearofpassing', $yearofpassing, PDO::PARAM_STR);
    $query->bindParam(':lan1', $lan1, PDO::PARAM_STR);
    $query->bindParam(':lan2', $lan2, PDO::PARAM_STR);
    $query->bindParam(':sub1', $sub1, PDO::PARAM_STR);
    $query->bindParam(':sub2', $sub2, PDO::PARAM_STR);
    $query->bindParam(':sub3', $sub3, PDO::PARAM_STR);
    $query->bindParam(':sub4', $sub4, PDO::PARAM_STR);
    $query->bindParam(':nameofinstitution1', $nameofinstitution1, PDO::PARAM_STR);
    $query->bindParam(':tmarks1', $tmarks1, PDO::PARAM_STR);
    $query->bindParam(':yearofpassing2', $yearofpassing2, PDO::PARAM_STR);
    $query->bindParam(':category', $category, PDO::PARAM_STR);
    $query->bindParam(':Overallmeritrank', $Overallmeritrank, PDO::PARAM_STR);
    $query->bindParam(':Categoryrank', $Categoryrank, PDO::PARAM_STR);
    $query->bindParam(':JEEmarks', $JEEmarks, PDO::PARAM_STR);
    $query->bindParam(':OverallMeritRank1', $OverallMeritRank1, PDO::PARAM_STR);
    $query->bindParam(':Diplomadegree', $Diplomadegree, PDO::PARAM_STR);
    $query->bindParam(':nameofinstitution', $nameofinstitution, PDO::PARAM_STR);
    $query->bindParam(':tmarks', $tmarks, PDO::PARAM_STR);
    $query->bindParam(':yearofpassing1', $yearofpassing1, PDO::PARAM_STR);

    $query->execute();

    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {
        echo '<script>alert("level info has been added.")</script>';
        echo "<script>window.location.href ='leveldetails.php'</script>";
    } 
}
?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Add Education info</li>
                                </ol>
                            </nav>
                        </div>
    <h2>Education Details Form</h2>
  <form class="forms-sample" method="post">  
  <h2>Secondary Education Details </h2>
        <label for="cregisterno">Registration Number:</label>
        <input type="text" name="cregisterno" required>

      
        <label for="schoolname">School Name:</label>
        <input type="text" name="schoolname" required>

      
        <label for="board">Board:</label>
        <input type="text" name="board" required>

        <div class="form-group">
        <label for="medium">Medium:</label>
        <input type="text" name="medium" required>
        
        <div class="form-group">
        <label for="totalmarks">Total Marks:</label>
        <input type="text" name="totalmarks" required>

        
        <div class="form-group">
        <label for="yearofpassing">Year of Passing:</label>
        <input type="text" name="yearofpassing" required>

        <h2>Higher Education Details </h2>

        <div class="form-group">
        <label for="lan1">Language 1:</label>
        <input type="text" name="lan1" required>

        <div class="form-group">
        <label for="lan2">Language 2:</label>
        <input type="text" name="lan2" required>

        <div class="form-group">
        <label for="sub1">Subject 1:</label>
        <input type="text" name="sub1" required>

        <div class="form-group">
        <label for="sub2">Subject 2:</label>
        <input type="text" name="sub2" required>

        <div class="form-group">
        <label for="sub3">Subject 3:</label>
        <input type="text" name="sub3" required>

        <div class="form-group">
        <label for="sub4">Subject 4:</label>
        <input type="text" name="sub4" required>

        <div class="form-group">
        <label for="nameofinstitution1">Name of Institution:</label>
        <input type="text" name="nameofinstitution1" required>

        <div class="form-group">
        <label for="tmarks1">Total Marks:</label>
        <input type="text" name="tmarks1" required>

        <div class="form-group">
        <label for="yearofpassing2">Year of Passing:</label>
        <input type="text" name="yearofpassing2" required>

        
        <h2>Centac Rank details</h2>

        <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" name="category" required>

        <div class="form-group">
        <label for="Overallmeritrank">Overall Merit Rank:</label>
        <input type="text" name="Overallmeritrank" required>

        <div class="form-group">
        <label for="Categoryrank">Category Rank:</label>
        <input type="text" name="Categoryrank" required>

        <div class="form-group">
        <label for="JEEmarks">JEE Marks:</label>
        <input type="text" name="JEEmarks" required>

        <div class="form-group">
        <label for="OverallMeritRank1">Overall Merit Rank 1:</label>
        <input type="text" name="OverallMeritRank1" required>

        <h2>Diploma Degree/UG</h2>

        <div class="form-group">
        <label for="Diplomadegree">Diploma Degree:</label>
        <input type="text" name="Diplomadegree" required>

        <div class="form-group">
        <label for="nameofinstitution">Name of Institution:</label>
        <input type="text" name="nameofinstitution" required>

        <div class="form-group">
        <label for="tmarks">Total Marks:</label>
        <input type="text" name="tmarks" required>

        <div class="form-group">
        <label for="yearofpassing1">Year of Passing:</label>
        <input type="text" name="yearofpassing1" required>

        <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
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

<style>
        body {
font-family: Arial, sans-serif;
margin: auto;
        }

        form {
          
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 13px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>