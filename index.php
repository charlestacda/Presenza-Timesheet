<?php
    include_once 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Attendance</title>
	<link rel="shorcut icon" type="image" href="img/icon.png">

    <!-- Custom fonts for this template -->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link
      href="vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <?php include 'dbcon.php'; ?>

  <body id="page-top" onload="checkAdmin()">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="navbar-nav sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          onclick="valueSenderIndex()"
        >
          <div class="sidebar-brand-icon">
            <img src="img/logo-w.png" alt="" />
          </div>
          <div class="sidebar-brand-text mx-3">
            <div>PRESENZA</div>
            <div class="com">COMPANY</div>
          </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Attendance</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Monitoring -->
        <li class="nav-item ">
          <a class="nav-link" onclick="valueSenderCharts()">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Monitoring</span></a
          >
        </li>

        <!-- Nav Item - Employees -->
        <li class="nav-item" id="navEmp">
          <a class="nav-link" onclick="valueSenderTables()"> <!-- onclick="valueSender()" -->
            <i class="fas fa-fw fa-table"></i>
            <span>Employees</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="navbar navbar-expand navbar-light mainc topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
              <button
                id="sidebarToggleTop"
                class="btn btn-link d-md-none rounded-circle mr-3"
              >
                <i class="fa fa-bars"></i>
              </button>
            </form>

            <!-- Topbar Search -->
            <h5>Timesheet</h5>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Alerts -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="alertsDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                  <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div
                  class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="alertsDropdown"
                >
                  <h6 class="dropdown-header">Alerts Center</h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 12, 2019</div>
                      <span class="font-weight-bold"
                        >A new monthly report is ready to download!</span
                      >
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 7, 2019</div>
                      $290.29 has been deposited into your account!
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 2, 2019</div>
                      Spending Alert: We've noticed unusually high spending for
                      your account.
                    </div>
                  </a>
                  <a
                    class="dropdown-item text-center small text-gray-500"
                    href="#"
                    >Show All Alerts</a
                  >
                </div>
              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >

                <!-- FETCHING DATA -->

                <?php $id = $_REQUEST['$id_emp'];
                $sql = "SELECT  * FROM employee WHERE id_emp = $id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $profilepic=$row['profilepic'];
                $headerFname=$row['fname'];
                $headerLname=$row['lname'];
                $isAdmin = $row['isAdmin'];
                ?>


                  <span class="mr-2 d-none d-lg-inline text-gray-600 small" onload="valueReceiver()"
                    ><?php echo $headerFname . " " . $headerLname?></span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="<?php echo $profilepic; ?>"   
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-divider"></div>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <!-- Page Heading -->
            <div class="cntr">
                        <div class="mg-100 sub-color" style="width: 650px; height: fit-content;">
                            <div class="mg-50">
                                <div class="container-fluid">
                                    <div class="row justify-content-around">
                                        <div class="col-lg-12 cntr">
                                            <div id="clock"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-around">
                                        <div class="col-lg-12 cntr">
                                            <div id="date"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid mg-20">
                                    <div class="row justify-content-around">
                                        <div class="col-lg-12 cntr">
                                            <?php
                                            date_default_timezone_set("Asia/Manila");
                                            if (isset($_POST['time_in']) || isset($_POST['time_out'])) {
                                            
                                              // Get the form data
											  $query = "SELECT fname, lname FROM employee WHERE id_emp = $id";
                                              $result = mysqli_query($conn, $query);
                                              $row = mysqli_fetch_assoc($result);
											  $fname = $row['fname'];
											  $lname = $row['lname'];
											  $fullname = $fname . ' ' . $lname;
                                              $time = date('g:i:s A');
                                              $date = date('F d, Y');

                                              
                                            if (isset($_POST['time_in'])){
                                              // Insert the data into the database                                  
                                              $query = "INSERT INTO timesheet (name, date, timeIn, id_emp) VALUES ('$fullname', '$date', '$time', '$id')";
                                            }
                                            else {
                                              $query = "SELECT timeIn FROM timesheet WHERE id = (SELECT MAX(id) FROM timesheet)";
                                              $result = mysqli_query($conn, $query);
                                              $row = mysqli_fetch_assoc($result);
                                              $time_in = $row['timeIn'];
                                              $time_out = date('g:i:s A');
                                              $time_in_timestamp = strtotime($time_in);
                                              $time_out_timestamp = strtotime($time_out);
                                              $difference = $time_out_timestamp - $time_in_timestamp;
                                              $hour_difference = $difference / 3600;

                                              if ($hour_difference < 9 && $hour_difference > 7){
                                                  $remark = 'Working Hours Complete';
                                              }
                                              else if ($hour_difference == 9 || $hour_difference > 9){
                                                  $remark = 'Overtime';
                                              }
                                              else if ($hour_difference == 7 || $hour_difference < 7){
                                                  $remark = 'Undertime';
                                              }else {
                                                  $remark = 'Error';
                                              }
                                              $query = "UPDATE timesheet SET timeOut = '$time', remarks = '$remark' WHERE id = (SELECT MAX(id) FROM timesheet)";
                                            }
                                              mysqli_query($conn, $query);
                                            }
                                            $query = "SELECT COUNT(*) as count FROM timesheet WHERE timeOut IS NULL";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count'];

                                            if ($count > 0) {
                                              echo '<form method="post"><input type="submit" class="btn" id="btn-1" style="background-color: #EFF8FF; color: #1D668C; " name="time_out" value="Time Out"></form>';
                                            } else {
                                              echo '<form method="post"><input type="submit" class="btn" id="btn-1" style="background-color: #EFF8FF; color: #1D668C; " name="time_in" value="Time In"></form>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Attendance Sheet
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                            <?php
                            $query = "SELECT * FROM timesheet where id_emp = $id";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                    echo '<thead><tr><th>No.</th><th>Name</th><th>Date</th><th>Time In</th><th>Time Out</th><th>Remarks</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['id'] . '</td>';
										echo '<td>' . $row['name'] . '</td>';
                                        echo '<td>' . $row['date'] . '</td>';
                                        echo '<td>' . $row['timeIn'] . '</td>';
                                        echo '<td>' . $row['timeOut'] . '</td>';
                                        echo '<td>' . $row['remarks'] . '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                                } else {
                                  echo 'No records found';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Presenza Company 2023</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
      function updateClock() {
        // Get the current time
        var now = new Date();

        // Get the hours, minutes, and seconds
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Pad the hours, minutes, and seconds with leading zeros if needed
        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        // Convert the hours to 12-hour format
        var ampm = hours >= 12 ? "PM" : "AM";
        hours = hours > 12 ? hours - 12 : hours;
        hours = hours == 0 ? 12 : hours;

        // Construct the clock display string
        var clockString = hours + ":" + minutes + ":" + seconds + " " + ampm;

        // Update the clock div with the current time
        document.getElementById("clock").innerHTML = clockString;
      }

      // Update the clock every 1000 milliseconds (1 second)
      setInterval(updateClock, 1000);

      function updateDate() {
        // Get the current date
        var now = new Date();

        // Get the day of the week, month, day, and year

        var month = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ][now.getMonth()];
        var day = now.getDate();
        var year = now.getFullYear();

        // Construct the date display string
        var dateString = " " + month + " " + day + ", " + year;

        // Update the date div with the current date
        document.getElementById("date").innerHTML = dateString;
      }

      // Update the date every 1000 milliseconds (1 second)
      setInterval(updateDate, 1000);
    </script>

 <!-- JS FOR ADMIN CHECK -->
<script>
      function checkAdmin(){

            var x = <?php echo $isAdmin;?>;
            var navEmp = document.getElementById('navEmp');
            if(x==0){
                navEmp.remove();
            }
            else{

            }
      }

                function valueSenderTables()
                {
                    var a=<?php echo $id; ?>;
                    // alert(<?php echo $id; ?>);
                    localStorage.setItem("idValue", a);
                    window.location.href="tables.php<?php echo '?$id_emp='. $id;?>";
                }

                function valueSenderCharts()
                {
                    var a=<?php echo $id; ?>;
                    // alert(<?php echo $id; ?>);
                    localStorage.setItem("idValue", a);
                    window.location.href="charts.php<?php echo '?$id_emp='. $id;?>";
                }

    </script>

            

  </body>
</html>
