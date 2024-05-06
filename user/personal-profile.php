<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsstuid']==0)) {
  header('location:logout.php');
  } else{
   
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student Management System|| View Students Profile</title>
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
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> View Students Profile </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Students Profile</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <table border="1" class="table table-bordered mg-b-0">
                      <?php
$sid=$_SESSION['sturecmsstuid'];
$sql = $sql = "SELECT tbpersonal.name, tbpersonal.course, tbpersonal.Admission_category, tbpersonal.region, tbpersonal.community, tbpersonal.Special_category, tbpersonal.Enrollment_no, tbpersonal.Register_no, tbpersonal.DOB, tbpersonal.Mother_Tongue, tbpersonal.Blood_group, tbpersonal.DH, tbpersonal.Parent_name, tbpersonal.Address, tbpersonal.Email, tbpersonal.Mobile, tbpersonal.Paddress FROM tbpersonal join tblstudent on tblstudent.StuID=tbpersonal.Register_no where tblstudent.StuID=:sid";


$query = $dbh -> prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
 <tr align="center" class="table-warning">
<td colspan="4" style="font-size:20px;color:blue">
 personal info</td></tr>

    <tr class="table-info">
    <th>Student Name</th>
    <td><?php  echo $row->name;?></td>
     <th>course</th>
    <td><?php  echo $row->course;?></td>
  </tr>
  <tr class="table-warning">
     <th>Admission_category</th>
    <td><?php  echo $row->Admission_category;?> </td>
     <th>Region</th>
    <td><?php  echo $row->region;?></td>
  </tr>
  <tr class="table-danger">
    <th>community</th>
    <td><?php  echo $row->community;?></td>
    <th>Special_category</th>
    <td><?php  echo $row->Special_category;?></td>
  </tr>
  <tr class="table-success">
    <th>Enrollment_number</th>
    <td><?php  echo $row->Enrollment_no;?></td>
    <th>Register number</th>
    <td><?php  echo $row->Register_no;?></td>
  </tr>
  <tr class="table-primary">
    <th>DOB</th>
    <td><?php  echo $row->DOB;?></td>
    <th>Mother_Tongue</th>
    <td><?php  echo $row->Mother_Tongue;?></td>
  </tr>
  <tr class="table-progress">
    <th>Blood_group</th>
    <td><?php  echo $row->Blood_group;?></td>
    <th>Hosteller/Day-scholar</th>
    <td><?php  echo $row->DH;?></td>
  </tr>
  <tr class="table-info">
    <th>Parent_name</th>
    <td><?php echo $row->Parent_name; ?></td>
    <th>Address</th>
    <td><?php echo $row->Address; ?></td>
</tr>
<tr class="table-info">
    <th>MObile Number</th>
    <td><?php echo $row->Mobile; ?></td>
    <th>Permanent Address</th>
    <td><?php echo $row->Paddress; ?></td>
</tr>

  <?php $cnt=$cnt+1;}} ?>
</table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
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
</html><?php }  ?>