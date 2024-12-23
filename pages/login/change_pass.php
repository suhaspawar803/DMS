<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: forgot.php");
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
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
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
                <h5 class="mb-0 font-weight-normal">User</h5>
                <span>Unknown</span>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Dashboard</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../../index.html">
            <span class="menu-icon">
              <i class="mdi mdi-login-variant"></i>
            </span>
            <span class="menu-title">Login</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="https://www.pravarapvpcollege.org.in/">
            <span class="menu-icon">
              <i class="mdi mdi-earth"></i>
            </span>
            <span class="menu-title">Official Website</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="pages/about.php">
            <span class="menu-icon">
              <i class="mdi mdi-information-outline"></i>
            </span>
            <span class="menu-title">About</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="pages/documentation.php">
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
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" data-toggle="dropdown">
                <div class="navbar-profile">
                  <span class="menu-icon">
                    <i class="mdi mdi-logout text-danger" alt=""></i>
                  </span>
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">Login</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a href="../../index.html" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-login-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">LogIn</p>
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

      <!-- partial -->
      <div class="main-panel">
        <!-- content-wrapper -->
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                <center>Change Password</center>
              </h4>
              <form class="form-sample" method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email *</label>
                      <div class="col-sm-9">
                        <input type="email" name="username" class="form-control" required />
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Old Password *</label>
                      <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" required />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">New Password *</label>
                      <div class="col-sm-9">
                        <input type="password" name="new_pass" class="form-control" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Confirm Password *</label>
                      <div class="col-sm-9">
                        <input type="password" name="new_pass1" class="form-control" required />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button type="reset" class="btn btn-dark" value="cancle">Cancel</button>
                </div>
              </form>
            </div>

            <?php
            if ($_POST) {
              $username = $_POST['username'];
              $password = $_POST['password'];
              $new_pass = $_POST['new_pass'];
              $new_pass1 = $_POST['new_pass1'];
              include '../../data.php';

              if ($new_pass == $new_pass1) {
                $sql = "SELECT password FROM users WHERE username='$username';";
                $temp = pg_query($db, $sql);
                $pass = pg_fetch_row($temp);
                if ($pass[0] == $password) {
                  $update = "UPDATE users set password='$new_pass' where username='$username';";
                  $ret = pg_query($db, $update);
                  if ($ret) {
                    echo "<center>Password Updated Succesfully !!</center>";
                  } else {
                    echo pg_last_error($db);
                  }
                }
              } else {
                echo "Password Missmatch !! Try Again...";
              }
              pg_close($db);
            }
            ?>

          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>

      <!-- partial -->
    </div>
    <!-- main-panel ends -->
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