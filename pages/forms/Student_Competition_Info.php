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
                  if ($db) {
                    $user = $_SESSION['username'];
                    $sql = "SELECT name,role FROM users WHERE username='$user';";
                    $ret = pg_query($db, $sql);
                    if (!$ret) {
                      echo "User";
                    } else {
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
        if ($role == 'Student') {
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
        } else {
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
                if ($role != 'Teacher') {
                ?>
                  <li class="nav-item"><a class="nav-link" href="../utility/Teacher_Edit.php">Add/Remove Teacher</a></li>
                  <?php
                  if ($role != 'HOD') {
                  ?>
                    <li class="nav-item"><a class="nav-link" href="../utility/Hod_Edit.php">Add/Remove HOD</a></li>
                    <?php
                    if ($role != 'Principal') {
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
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                <center>Student Competation Information</center>
              </h4>
              <br>
              <form class="form-sample" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Student's Full Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="sname" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name Of Competition</label>
                      <div class="col-sm-9">
                        <input type="text" name="cname" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Duration</label>
                      <div class="col-sm-9">
                        <input type="text" name="duration" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date</label>
                      <div class="col-sm-9">
                        <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Price/Awards</label>
                      <div class="col-sm-9">
                        <input type="text" name="awards" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Place</label>
                      <div class="col-sm-9">
                        <input type="text" name="place" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Level</label>
                      <div class="col-sm-9">
                        <select name="level" class="form-control">
                          <option value="local">Local</option>
                          <option value="district">District</option>
                          <option value="university">University</option>
                          <option value="state">State</option>
                          <option value="national">National</option>
                          <option value="international">International</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Class</label>
                      <div class="col-sm-9">
                        <select name="class" class="form-control">
                          <option value="fybcs">FYBCS</option>
                          <option value="sybcs">SYBCS</option>
                          <option value="tybcs">TYBCS</option>
                          <option value="fymcs">FYMCS</option>
                          <option value="symcs">SYMCS</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                   <!--  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Upload Certificate</label>
                      <div class="col-sm-9">
                        <input type="file" name="image" class="form-control" />
                      </div>
                    </div> -->
                    <button type="submit" value="SUBMIT" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-dark" value="cancle">Cancel</button>
                  </div>

                </div>
              </form>
            </div>


            <?php
            if ($_POST) {
              $sname = $_POST['sname'];
              $cname = $_POST['cname'];
              $awards = $_POST['awards'];
              $duration = $_POST['duration'];
              $date = $_POST['date'];
              $class = $_POST['class'];
              $place = $_POST['place'];
              $level = $_POST['level'];
              //$image= $_POST['image'];
              $library = "#";
              include '../../data.php';
              if ($db) {
                $sql = "INSERT INTO Student_competition_info VALUES(DEFAULT,'$sname', '$cname', '$awards','$duration','$date','$level','$place','$class','$library');";
               // $sql = "INSERT INTO certificate VALUES ('$image');";
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
           <?php
          //   if ($_POST) {
          //   $image=$_POST['image'];
          //   $pdo = new PDO('pgsql:host=localhost;dbname=dms', 'postgres', 'root');

          //   // Check if a file was uploaded
          //   if ($_FILES[$image]['error'] == UPLOAD_ERR_OK && $_FILES[$image]['size'] <= 400000) {
          //     // Prepare a SQL statement to insert the image data into the database
          //     $stmt = $pdo->prepare('INSERT INTO certificate VALUES (:data)');
          //     $stmt->bindParam(':data', file_get_contents($_FILES['image']['tmp_name']));
          //     $stmt->execute();
          //     echo 'Image uploaded successfully.';
          //   } else {
          //     echo 'Error uploading image.';
          //   }
          // }
            //?>


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

  <script>
    function createPDF() {
      var sTable = document.getElementById('tab').innerHTML;

      var style = "<style>";
      style = style + "table {width: 100%;font: 17px Calibri;}";
      style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
      style = style + "padding: 2px 3px;text-align: center;}";
      style = style + "</style>";

      // CREATE A WINDOW OBJECT.
      var win = window.open('', '', 'height=700,width=700');

      win.document.write('<html><head>');
      win.document.write('<title>Progress Report</title>'); // <title> FOR PDF HEADER.
      win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
      win.document.write('</head>');
      win.document.write('<body><center><h5>Loknete Dr.Balasaheb Vikhe Patil (Padma Bhushan Awardee)<br>Pravara Rural Education Society’s</h5><h4>Padmashri Vikhe Patil College, Pravaranagar,<br><u>Tal:Rahata, Dist:Ahmednagar.<br>Academic Year – 2022-23</u></h4></center><p><b>Name of the Department :</b> Computer- Science <b><hr></b></p>');
      win.document.write(sTable); // THE TABLE CONTENTS INSIDE THE BODY TAG.
      win.document.write('</body></html>');

      win.document.close(); // CLOSE THE CURRENT WINDOW.

      win.print(); // PRINT THE CONTENTS.
    }
  </script>
  <script type="text/javascript">
    function exportTableToExcel(tab, filename = '') {
      var downloadLink;
      var dataType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById('tab');
      var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
      var header = "<center><h5>Loknete&nbsp; Dr.Balasaheb&nbsp; Vikhe&nbsp; Patil&nbsp; (Padma&nbsp; Bhushan&nbsp; Awardee)<br>Pravara&nbsp; Rural&nbsp; Education&nbsp; Society</h5><h4>Padmashri&nbsp; Vikhe&nbsp; Patil&nbsp; College,&nbsp; Pravaranagar,<br><u>Tal:Rahata,&nbsp; Dist:Ahmednagar.&nbsp;<br>Academic&nbsp; Year-2022-23</u></h4></center><p><b>Name&nbsp; of&nbsp; the&nbsp; Department&nbsp; :</b>&nbsp; Computer- Science <b><hr></b></p>"

      // Specify file name
      filename = filename ? filename + '.xls' : 'Progress Report.xls';

      // Create download link element
      downloadLink = document.createElement("a");

      document.body.appendChild(downloadLink);

      if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', header + tableHTML], {
          type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
      } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + header + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
      }
    }
  </script>
  <script type="text/javascript">
    function Export2Word(element, filename = '') {
      var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Progress Report</title></head><body> <center><h5>Loknete Dr.Balasaheb Vikhe Patil (Padma Bhushan Awardee)<br>Pravara Rural Education Society’s</h5><h4>Padmashri Vikhe Patil College, Pravaranagar,<br><u>Tal:Rahata, Dist:Ahmednagar.<br>Academic Year – 2022-23</u></h4></center><p><b>Name of the Department :</b> Computer- Science </p><p><b><hr></b></p>";
      var postHtml = "</body></html>";
      var html = preHtml + document.getElementById('tab').innerHTML + postHtml;

      var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
      });

      // Specify link url
      var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

      // Specify file name
      filename = filename ? filename + '.doc' : 'Progress Report.doc';

      // Create download link element
      var downloadLink = document.createElement("a");

      document.body.appendChild(downloadLink);

      if (navigator.msSaveOrOpenBlob) {
        navigator.msSaveOrOpenBlob(blob, filename);
      } else {
        // Create a link to the file
        downloadLink.href = url;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
      }

      document.body.removeChild(downloadLink);
    }
  </script>


  <!-- End custom js for this page -->
</body>

</html>