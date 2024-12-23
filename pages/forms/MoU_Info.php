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
				  <li class="nav-item"><a class="nav-link" href="Student_Competition_Info.php">Add Competition</a></li>
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
			<li class="nav-item menu-items">
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
			<li class="nav-item menu-items active">
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
			<li class="nav-item menu-items">
			  <a class="nav-link" data-toggle="collapse" href="#util" aria-expanded="false" aria-controls="util">
				<span class="menu-icon">
				  <i class="mdi mdi-playlist-play"></i>
				</span>
				<span class="menu-title">Utilities</span>
				<i class="menu-arrow"></i>
			  </a>
			  <div class="collapse" id="util">
				<ul class="nav flex-column sub-menu">
				  <li class="nav-item"><a class="nav-link" href="../utility/Student_Edit.php">Add/Remove Student</a></li>
				  <?php
				    if($role!='Teacher')
					{
				  ?>
					  <li class="nav-item"><a class="nav-link" href="../utility/Teacher_Edit.php">Add/Remove Teacher</a></li>
				    <?php
					  if($role!='HOD')
					  {
					?>
						<li class="nav-item"><a class="nav-link" href="../utility/Hod_Edit.php">Add/Remove HOD</a></li>
					  <?php
					    if($role!='Principal')
					    {
					  ?>
				          <li class="nav-item"><a class="nav-link" href="../utility/Principal_Edit.php">Add/Remove Principal</a></li>
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
        <!-- content-wrapper -->
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                <center> MoU Details</center>
              </h4>
              <form class="form-sample" method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name of the Dept.</label>
                      <div class="col-sm-9">
                        <input type="text" name="department" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name of the Company / Institute</label>
                      <div class="col-sm-9">
                        <input type="text" name="company" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <p class="card-description">Period of MoU</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">From Date</label>
                      <div class="col-sm-9">
                        <input type="date" name="fdate" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">To Date</label>
                      <div class="col-sm-9">
                        <input type="date" name="tdate" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Activity</label>
                      <div class="col-sm-9">
                        <input type="text" name="activity" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Purpose</label>
                      <div class="col-sm-9">
                        <input type="text" name="purpose" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" value="SUBMIT" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-dark" value="cancle">Cancel</button>
            </div>
            </form>
          </div>

          <?php
          if ($_POST) {
            $department = $_POST['department'];
            $company = $_POST['company'];
            $fdate = $_POST['fdate'];
            $tdate = $_POST['tdate'];
            $activity = $_POST['activity'];
            $purpose = $_POST['purpose'];

            include '../../data.php';
            if ($db) {
              $sql = "INSERT INTO mou_info VALUES(DEFAULT,'$department', '$company','$fdate','$tdate','$activity','$purpose');";
            }

            if (!$db) {
              echo "Error: ";
            } else {
              $ret = pg_query($db, $sql);
              if (!$ret) {
                echo "Error: ";
              } else {
                echo "New record added successfully";
              }
            }
            pg_close($db);
          }
          ?>


        </div>
      </div>
      <!-- content-wrapper ends -->

      <!-- partial:../../partials/_footer.html -->

      <!-- partial -->
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
  <script src="../../assets/vendors/select2/select2.min.js"></script>
  <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../../assets/js/file-upload.js"></script>
  <script src="../../assets/js/typeahead.js"></script>
  <script src="../../assets/js/select2.js"></script>
  <!-- End custom js for this page -->
</body>

</html>