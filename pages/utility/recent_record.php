<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../login/logout.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Department Managment System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="../../assets/images/faces/face15.png" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">
                  <?php
                    include '../../data.php';
                    if ($db)
					{
                      $user = $_SESSION['username'];
                      $sql = "SELECT name,role FROM users WHERE username='$user';";
                      $ret = pg_query($db, $sql);
                      if (!$ret)
					  {
                        echo "User";
                      }
					  else
					  {
                        $name = pg_fetch_row($ret);
                        echo $name[0];
						$role = $name[1]; //Extracting Role
                      }
                    }
                  ?>
                </h5>
                <span><?php echo $role; ?></span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <a href="../login/change_pass.php" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-lock"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="../login/to_do.php" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar-today text-success"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../display/users.php">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
		<?php
		  if($role=='Student')
		  {
		?>
			<li class="nav-item menu-items">
			  <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
				<span class="menu-icon">
                  <i class="mdi mdi-database-plus"></i>
				</span>
				<span class="menu-title">Add Certification</span>
				<i class="menu-arrow"></i>
			  </a>
			  <div class="collapse" id="auth">
				<ul class="nav flex-column sub-menu">
				  <li class="nav-item"><a class="nav-link" href="../forms/Student_Competition_Info.php">Add Competition</a></li>
				</ul>
			  </div>
			</li>
		<?php
		  }
		  else
		  {
		?>
			<li class="nav-item menu-items">
			  <a class="nav-link" data-toggle="collapse" href="#util1" aria-expanded="false" aria-controls="util1">
                <span class="menu-icon">
                  <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Staff</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="util1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="../display/Research_Paper_Info.php">Research Paper</a></li>
                  <li class="nav-item"><a class="nav-link" href="../display/Books_Published_Info.php">Books Published</a></li>
                  <li class="nav-item"><a class="nav-link" href="../display/Staff_Activity.php"> Staff Activity </a></li>
                  <li class="nav-item"><a class="nav-link" href="../display/Staff_Committees.php"> Involvement of Department Staff in various College Committees Work </a></li>
				</ul>
			  </div>
			</li>
			<li class="nav-item menu-items active">
			  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
			    <span class="menu-icon">
				  <i class="mdi mdi-account-multiple-outline"></i>
				</span>
				<span class="menu-title">Student</span>
				<i class="menu-arrow"></i>
			  </a>
			  <div class="collapse" id="ui-basic">
				<ul class="nav flex-column sub-menu">
				  <li class="nav-item"><a class="nav-link" href="../display/Student_competition_Info.php">Student Competition</a></li>
				  <li class="nav-item"><a class="nav-link" href="../display/Alumni_Info.php">Alumni Details</a></li>
				  <li class="nav-item"><a class="nav-link" href="../display/Student_Activities.php">Student Activities</a></li>
				</ul>
			  </div>
			</li>
			<li class="nav-item menu-items">
			  <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
				<span class="menu-icon">
				  <i class="mdi mdi-account-search"></i>
				</span>
				<span class="menu-title">User Pages</span>
				<i class="menu-arrow"></i>
			  </a>
			  <div class="collapse" id="auth">
				<ul class="nav flex-column sub-menu">
				  <li class="nav-item"><a class="nav-link" href="../display/Mou_Info.php"> MoU Details</a></li>
				  <li class="nav-item"><a class="nav-link" href="../display/Extra_Activity.php">Extra curricular Activity</a></li>
				  <li class="nav-item"><a class="nav-link" href="../display/Placement.php">Training & Placement</a></li>
				  <li class="nav-item"><a class="nav-link" href="../display/Extensions.php">Consultancy / Extension</a></li>
				</ul>
			  </div>
			</li>
			<li class="nav-item menu-items ">
			  <a class="nav-link" data-toggle="collapse" href="#util" aria-expanded="false" aria-controls="util">
				<span class="menu-icon">
				  <i class="mdi mdi-playlist-play"></i>
				</span>
				<span class="menu-title">Utilities</span>
				<i class="menu-arrow"></i>
			  </a>
			  <div class="collapse" id="util">
				<ul class="nav flex-column sub-menu">
				  <li class="nav-item"><a class="nav-link" href="#">Add/Remove Student</a></li>
				  <?php
				    if($role!='Teacher')
					{
				  ?>
					  <li class="nav-item"><a class="nav-link" href="Teacher_Edit.php">Add/Remove Teacher</a></li>
				    <?php
					  if($role!='HOD')
					  {
					?>
						<li class="nav-item"><a class="nav-link" href="Hod_Edit.php">Add/Remove HOD</a></li>
					  <?php
					    if($role!='Principal')
					    {
					  ?>
				          <li class="nav-item"><a class="nav-link" href="Principal_Edit.php">Add/Remove Principal</a></li>
				  <?php
						}
					  }
					}
				  ?>
				</ul>
			  </div>
			</li>
			<li class="nav-item menu-items">
			  <a class="nav-link" href="../reports/overall_report.php">
				<span class="menu-icon">
				  <i class="mdi mdi-file-document-box"></i>
				</span>
				<span class="menu-title">Academic Year Report</span>
			  </a>
			</li>
		<?php
		  }
		?>
		<li class="nav-item menu-items">
		  <a class="nav-link" href="https://www.pravarapvpcollege.org.in/">
			<span class="menu-icon">
			  <i class="mdi mdi-earth"></i>
			</span>
			<span class="menu-title">Official Website</span>
		  </a>
		</li>
		<li class="nav-item menu-items">
		  <a class="nav-link" href="../about.php">
			<span class="menu-icon">
			  <i class="mdi mdi-information-outline"></i>
			</span>
			<span class="menu-title">About</span>
		  </a>
		</li>
		<li class="nav-item menu-items">
		  <a class="nav-link" href="../documentation.php">
			<span class="menu-icon">
			  <i class="mdi mdi-file-document"></i>
			</span>
			<span class="menu-title">Documentation</span>
		  </a>
		</li>
	  </ul>
	</nav>
	<!-- partial -->
	<div class="container-fluid page-body-wrapper">
      <nav class="navbar p-0 fixed-top d-flex flex-row"><br>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav w-100">
          <li class="nav-item w-100">
            <h3 id="h3head">Department Managment System</h3><br>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown border-left">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar text-success"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject mb-1">Event today</p>
                  <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-danger"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject mb-1">Settings</p>
                  <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-link-variant text-warning"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject mb-1">Launch Admin</p>
                  <p class="text-muted ellipsis mb-0"> Change Window! </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <p class="p-3 mb-0 text-center">See all notifications</p>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
              <div class="navbar-profile">
                <span class="menu-icon">
                  <i class="mdi mdi-logout text-danger" alt="Log"></i>
                </span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
              <h6 class="p-3 mb-0">Profile</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item" href="../login/logout.php">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-logout text-danger"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject mb-1">Log Out</p>
                </div>
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial ends -->
	<!-- main-panel -->
      <div class="main-panel">

        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h3 id="h3head">Student's Record</h3>
              <div id="tab" class="card-body">
                <?php
                if (isset($_POST['remove'])) {
                  include '../../data.php';
                  if ($db) {
                    $nm = $_POST['remove'];
                    $sql = "DELETE FROM users WHERE username='$nm';";
                    $ret = pg_query($db, $sql);
                    if (!$ret) {
                      echo "<br>ERROR...<br>";
                    } else {
                      echo "<br>Removed one entry...<br>";
                    }
                  }
                }
                ?>

                <?php
                if (isset($_POST['add'])) {
                  $name = $_POST['name'];
                  $username = $_POST['username'];
                  $pass = $_POST['password'];
                  $library = $_POST['library'];
                  include '../../data.php';
                  if ($db) {
                    $sql = "INSERT INTO users VALUES(DEFAULT,'$name','$username','$pass','Student','$library');";
                    $ret = pg_query($db, $sql);
                    if (!$ret) {
                      echo "<br>ERROR...<br>";
                    } else {
                      echo "<br>Added one entry...<br>";
                    }
                  }
                }
                ?>

                <?php
                include '../../data.php';
                if ($db) {
                  $sql = "SELECT * FROM users WHERE role='Student';";
                  $ret = pg_query($db, $sql);
                  if (!$ret) {
                    echo "<br>Not found...<br>";
                  } else {
                    $inc = 0;
                    echo "<table style=border-collapse:collapse;height:auto;width:auto; overflow: auto; border=1>";
                    echo "<tr><th>Sr. No.</th>";
                    echo "<th>Name of the Student</th>";
                    echo "<th>Email</th>";
                    echo "<th>Password</th>";
                    echo "<th>Library_No</th></tr>";
                    while (($row = pg_fetch_array($ret)) != null) {
                      $inc++;
                      echo "<tr><td>" . $inc . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . $row['username'] . "</td>";
                      echo "<td>" . $row['password'] . "</td>";
                      echo "<td>" . $row['library_no'] . "</td>";
                      echo "<td>"
                ?>
                      <form class="form-sample" method="POST">
                        <button class="btn-danger" onclick="return confirm('Are You Sure You Want To Remove This Record ?')" type="submit" name="remove" value="<?php echo $row['username']; ?>">Remove</button>
                        <button class="btn-success" onclick="return confirm('Are You Sure You Want To Add This Record ?')" type="submit" name="add" value="<?php echo $row['username']; ?>">Add</button>
                      </form>
                <?php
                      echo "</td></tr>";
                    }
                    echo "</table>";
                  }
                } else {
                  echo "Error: ";
                }
                pg_close($db);
                ?>

              </div>
            </div>
          </div>
        </div>

        <!-- partial ends-->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../../assets/js/dashboard.js"></script>

  <!-- End custom js for this page -->
</body>

</html>