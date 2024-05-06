<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <?php
         $uid= $_SESSION['sturecmsuid'];
$sql="SELECT * from tblstudent where ID=:uid";

$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <p class="profile-name"><?php  echo htmlentities($row->StudentName);?></p>
                  <p class="designation"><?php  echo htmlentities($row->StudentEmail);?></p><?php $cnt=$cnt+1;}} ?>
                </div>
             
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span> 
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view-notice.php">
                <span class="menu-title">View Notice</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Personal.php">
                <span class="menu-title">Personal Information</span>  
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="leveldetails.php">
                <span class="menu-title">Level details</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li> 
 <li class="nav-item">
              <a class="nav-link" href="semester_grades_form.php">
                <span class="menu-title">Level des</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="academic.php">
                <span class="menu-title">Academic details</span>

                <i class="icon-book-open menu-icon"></i>
              </a>
            </li> 
          </ul>
        </nav>