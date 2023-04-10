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

    <title>Employees</title>
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

    <link rel="stylesheet" href="font-awesome/css/all.min.css" />

    <!-- JS for Add Employee
    <script>
        document.getElementById("addEmployee").addEventListener("click", "addEmployeeConfirm");
        function addEmployeeConfirm() {
            confirm("Are you sure you want to add Employee?");
        }
    </script> -->



    <!-- Calculate Age -->
    <script>
      function deptSelected() {
        var x = document.getElementById("position");
        var option1 = document.createElement("option");
        var option2 = document.createElement("option");
        var option3 = document.createElement("option");
        var option4 = document.createElement("option");
        var option5 = document.createElement("option");

        var dept = document.getElementById("department").value;

        if(dept == "hr"){
          x.remove(option1);
          x.remove(option2);
          x.remove(option3);
          x.remove(option4);
          x.remove(option5);
          option5.text = "Choose...";
          x.add(option5);
          option1.text = "Human Resource Admin";
          option2.text = "Human Resource Associate";
          x.add(option1);
          x.add(option2);
        }
        else if(dept == "it"){
          x.remove(option1);
          x.remove(option2);
          x.remove(option3);
          x.remove(option4);
          x.remove(option5);
          option5.text = "Choose...";
          x.add(option5);
          option1.text = "IT Admin";
          option2.text = "IT Analyst";
          option3.text = "IT Project Manager";
          option4.text = "Network Engineer";
          x.add(option1);
          x.add(option2);
          x.add(option3);
          x.add(option4);
        }
        else if(dept == "marketing"){
          x.remove(option1);
          x.remove(option2);
          x.remove(option3);
          x.remove(option4);
          x.remove(option5);
          option5.text = "Choose...";
          x.add(option5);
          option1.text = "Marketing Associate";
          option2.text = "Marketing Manager";
          x.add(option1);
          x.add(option2);
        }
        else if(dept == "operations"){
          x.remove(option1);
          x.remove(option2);
          x.remove(option3);
          x.remove(option4);
          option1.text = "Customer Representative";
          x.add(option1);
        }
        else{
          x.remove(option1);
          x.remove(option2);
          x.remove(option3);
          x.remove(option4);
          option1.text = "Choose...";
          x.add(option1);
        }
      }
    </script>

  </head>

  <?php include 'dbcon.php'; ?>

  <body id="page-top" > <!-- onload="valueReceiver()" -->
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
        <li class="nav-item">
          <a class="nav-link" onclick="valueSenderIndex()">
            <i class="fas fa-fw fa-table"></i>
            <span>Attendance</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Monitoring -->
        <li class="nav-item">
          <a class="nav-link" onclick="valueSenderCharts()">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Monitoring</span></a
          >
        </li>

        <!-- Nav Item - Employees -->
        <li class="nav-item active">
          <a class="nav-link" href="">
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
            <h5>Employees</h5>

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
				$userPass=$row['password'];
                $profilepic=$row['profilepic'];
                $headerFname=$row['fname'];
                $headerLname=$row['lname'];
                $isAdmin = $row['isAdmin'];
                ?>
                
                
                

                <span class="mr-2 d-none d-lg-inline text-gray-600 small"
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
            <!-- DataTales Example -->
			<?php
			$deptSort = "";
			// Check if the form has been submitted
			if (isset($_POST['sortTable'])) {
			// Get the sort by and department values from the form
			$deptSort = mysqli_real_escape_string($conn, $_POST['sortTable']);
			}
			
			// Generate the dropdown menu
			echo "<div class='row mg-50'>";
            echo "<p class='ml-10 mg-10'>Department</p>";
            echo "<div class='dropdown'>";
			echo "<form method='post' action=''>";
			echo "<select name='sortTable' class='form-select form-control btnc' style='width: max-content' onchange='this.form.submit()'>";
			echo "<option value='All Department'";
			if (empty($deptSort)) echo " selected";
			echo ">All Departments</option>";
			echo "<option value='Human Resources'";
			if ($deptSort == "Human Resources") echo " selected";
			echo ">Human Resource Department</option>";
			echo "<option value='Information Technology'";
			if ($deptSort == "Information Technology") echo " selected";
			echo ">IT Department</option>";
			echo "<option value='Marketing'";
			if ($deptSort == "Marketing") echo " selected";
			echo ">Marketing Department</option>";
			echo "<option value='Operations'";
			if ($deptSort == "Operations") echo " selected";
			echo ">Operations Department</option>";
			echo "</select>";
			echo "</form>";
			echo "</select>";
			echo "</div>";
			?>
		
		
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-striped table-hover tb-color"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead class="tcolor">
                      <tr>
					    <th style="display: none">Fname</th>
						<th style="display: none">Mname</th>
						<th style="display: none">Lname</th>
						<th style="display: none">Gender</th>
						<th style="display: none">Bday</th>
						<th style="display: none">Address</th>
						<th style="display: none">City</th>
						<th style="display: none">Province</th>
						<th style="display: none">Postal</th>
						<th style="display: none">Profile</th>
                        <th>Name</th>
                        <th>Employee ID</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="tcolor">
                      <?php 

						// Build the SQL query
						$query = "SELECT * FROM employee WHERE status ='Active'" ;
						if (!empty($deptSort) && $deptSort != "All Department") {
						  $query .= " AND department = '$deptSort'";
						}
						$query .= " ORDER BY id_emp ASC";
		  
						date_default_timezone_set("Asia/Manila");
                        $result = mysqli_query($conn, $query);
                         while ($row = mysqli_fetch_array($result)) {
                        //or mysqli_fetch_assoc() fetches a result row as an associative array
                              $fname=$row['fname'];
                              $midname = $row['midname'];
                              $lname = $row['lname'];
							  $gender = $row['gender'];
							  $address = $row['address'];
							  $city = $row['city'];
							  $province = $row['province'];
							  $postal = $row['postal_code'];
							  $profile = $row['profilepic'];
                              $id_emp = $row['id_emp'];
                              $bday = $row['bday'];
                              $email = $row['email'];
                              $phoneno = $row['phone_no'];
                              $position = $row['position'];
                              $department = $row['department'];
							  $password = $row['password'];
							  
							  // Convert DATE to DateTime
							  $start = new DateTime($bday);
							  $end = new DateTime('now');
							  $diff = $start->diff($end);
							  
							  // Convert DateTime to String
							  $age = $diff->format('%y');
							  
                          ?>

                      <tr>
						<td style="display: none"><?php echo $fname; ?></td>
						<td style="display: none"><?php echo $midname; ?></td>
						<td style="display: none"><?php echo $lname; ?></td>
						<td style="display: none"><?php echo $gender; ?></td>
						<td style="display: none"><?php echo $bday; ?></td>
						<td style="display: none"><?php echo $address; ?></td>
						<td style="display: none"><?php echo $city ?></td>
						<td style="display: none"><?php echo $province ?></td>
						<td style="display: none"><?php echo $postal ?></td>
						<td style="display: none"><?php echo $profile ?></td>
                        <td><?php echo $fname . ' ' . $lname;?></td>
                        <td><?php echo $id_emp; ?></td>
                        <td><?php echo $age; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phoneno; ?></td>
                        <td><?php echo $position; ?></td>
                        <td><?php echo $department; ?></td>
						<td style="display: none"><?php echo $password ?></td>
                        <td>
                          <!-- Button trigger modal (Edit) -->
                          <button
                            type="button"
                            class="btn btn-outline-primary editbtn"
                          >
                            <i class="fa-solid fa-pen"></i>
                          </button>

                          <!-- Button trigger modal -->
                          <button
                            type="button"
                            class="btn btn-outline-secondary archivebtn"
                          >
                            <i class="fa-solid fa-box-archive"></i>
                          </button>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>

                  
                  <!-- Button trigger (Add Employee) -->
                  <div class="d-flex justify-content-center mg-50">
                    <button style="padding-top: 15px;"
                      type="button"
                      class="btn btn-outline-success mx-auto"
                      data-bs-toggle="modal"
                      data-bs-target="#addEmp"
                    >
                      <i class="fa-solid fa-plus"></i>
                      <p>Add Employee</p>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal (Add Employee) -->
            <div class="modal fade" id="addEmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #1D668C;">Add Employee</h5>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form onsubmit="return confirm('Are you sure you want to add Employee?') && validateForm()" class="row g-3" action="add_employee.php" method="POST" enctype="multipart/form-data" name="addForm">
                                <div class="col-md-4">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" >
										<div class="invalid-feedback">
										  Please enter first name.
										</div>
                                </div>
                                    <div class="col-md-4">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName" placeholder="(optional)" name="midname">
                                    </div>
                                <div class="col-md-4">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lName" name="lname">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="inputGender" class="form-label">Gender</label>
                                    <select id="inputGender" class="form-select form-control required" name="gender">
                                        <option value="" selected>Choose...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="bday" class="form-label">Birthday</label>
                                    <input class="form-control" type="date" id="bday" name="bday">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>

                                <div class="col-4 mg-20">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="09xxxxxxxxx" pattern="[0-9]{11}" required name="phoneno">
                                </div>
                                <div class="col-8 mg-20">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
                                </div>
                                <div class="col-md-6 mg-20">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="province" name="province">
                                </div>
                                <div class="col-md-2 mg-20">
                                    <label for="postalcode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="postalcode" name="postalcode">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="fileToUpload" class="form-label">Profile Picture</label>
                                    <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="department" class="form-label">Department</label>
                                    <select id="department" class="form-select form-control" name="department" onchange="deptSelected()">
										<option value="" selected>Choose...</option>
                                        <option value="hr">Human Resources</option>
                                        <option value="it">Information Technology</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="operations">Operations</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mg-20">
                                  <label for="position" class="form-label">Position</label>
                                  <select id="position" class="form-select form-control" name="position">
										<option value="" selected>Choose...</option>
                                  </select>
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="id" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="id" name="id_emp">
                                </div>
                                <div class="col-md-4 mg-20">
                                  <label for="password" class="form-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password">
                              </div>
                              <div class="col-md-4 mg-20">
                                <label for="cPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cPassword" name="cPassword">
                            </div>
                            
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn tcolor pbtn" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn tcolor btnc" name="submit">Add Employee</button>
                                </div>
                            </form>
                    </div>
                    </div>
                </div>

            <!-- Modal (Edit Data) -->
            <div
              class="modal fade"
              id="editmodal"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #1d668c">Edit Data</h5>
                            <button
                            type="button"
                            class="btn"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    <div class="modal-body">
                        <form onsubmit="return confirm('Are you sure you want to update this Employee record?')" class="row g-3" action="update_employee_record.php" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="editFname" name="fname" value="<?php echo $fname; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="editMname" name="midname" value="<?php echo $midname; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="editLname" name="lname" value="<?php echo $lname; ?>">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="inputGender" class="form-label">Gender</label>
                                    <select id="editGender" class="form-select form-control" name="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="editBday" class="form-label">Birthday</label>
                                    <input class="form-control" type="date" id="editBday" name="bday">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="email">
                                </div>

                                <div class="col-4 mg-20">
                                    <label for="editPhoneno" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="editPhoneno" pattern="[0-9]{11}" name="phoneno">
                                </div>
                                <div class="col-8 mg-20">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="editAddress" placeholder="1234 Main St" name="address">
                                </div>
                                <div class="col-md-6 mg-20">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="editCity" name="city">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="editProvince" name="province">
                                </div>
                                <div class="col-md-2 mg-20">
                                    <label for="postalcode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="editPostalcode" name="postalcode">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="fileToUpload" class="form-label">Profile Picture</label>
                                    <input class="form-control" type="file" id="editFileToUpload" name="fileToUpload">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="department" class="form-label">Department</label>
                                    <select id="editDept" class="form-select form-control" name="department" onchange="clearOptions()">
                                        <option value="Human Resources">Human Resources</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Operations">Operations</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mg-20">
                                  <label for="editPosition" class="form-label">Position</label>
                                  <select id="editPosition" class="form-select form-control" name="position">
                                  </select>
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="edit_id" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="edit_id" name="edit_id" readonly>
                                </div>  
							  <div class="col-md-4 mg-20">
                                  <label for="checkoldPassword" class="form-label">Old Password</label>
                                  <input type="password" class="form-control" id="checkoldPassword" name="checkoldPassword">
                              </div>
                              <div class="col-md-4 mg-20">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="editnewPassword" name="newPassword">
                            </div>
                            <div class="col-md-4 mg-20">
                                <label for="oldPassword" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" id="editoldPassword" name="oldPassword">
                            </div>
							<div class="col-md-4 mg-20">
                                  <input hidden type="password" class="form-control" id="editcurrentPassword" name="currentPassword">
                             </div>

                            </div>

                        <div class="modal-footer">
                            <button
                            type="button"
                            class="btn tcolor pbtn"
                            data-bs-dismiss="modal"
                            >
                            Cancel
                            </button>
                            <button type="submit" class="btn tcolor btnc" name="updateEmp">
                            Save Changes
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>

            <!-- Modal (Archive)-->
            <div
              class="modal fade"
              id="archivemodal"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5
                      class="modal-title"
                      id="exampleModalLabel"
                      style="color: #1d668c"
                    >
                      Archive
                    </h5>
                    <button
                      type="button"
                      class="btn"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    >
                      <i class="fa-solid fa-xmark"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>
                      You are about to archive an employee record in the system.
                      Are you sure you want to archive this record?
                    </p>

                    <form class="row g-3 justify-content-center" action="archive_employee.php" method="POST" enctype="multipart/form-data" >
                      <div class="col-md-8 mg-20">

                        <input type="hidden" name="archive_id" id="archive_id"/>
						<input type="hidden" name="user_password" value="<?php echo $userPass; ?>">
                        <input
                          type="password"
                          class="form-control"
                          id="inputPassword4"
                          placeholder="Confirm your Password"
						  name="inputPassword4"
                        />
                      </div>
                    

                      <div class="mg-40">
                        <p>NOTE: THIS ACTION CANNOT BE REVERTED ONCE CONFIRMED</p>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn tcolor pbtn"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                    <button type="submit" class="btn btnc tcolor" name="archiveData">
                      Confirm
                    </button>
                  </form>
                  </div>
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

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
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
    <script type="text/javascript">
      $("#datepicker").datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
      });
      $("#datepicker").datepicker("setDate", new Date());
    </script>

    <!-- JS FOR DELETE MODAL -->
    <script>
      $(document).ready(function(){

        $('.archivebtn').on('click', function() {

          $('#archivemodal').modal('show');


              $tr = $(this).closest('tr');
              
              var data = $tr.children("td").map(function() {
                return $(this).text();
              }).get();

              console.log(data);

              $('#archive_id').val(data[11]);
			  
			  
        });


      });
    </script>

    <!-- JS FOR EDIT MODAL -->
    <script>
      $(document).ready(function(){

        $('.editbtn').on('click', function() {

          $('#editmodal').modal('show');


              $tr = $(this).closest('tr');
              
              var data = $tr.children("td").map(function() {
                return $(this).text();
              }).get();

              console.log(data);

			  
              $('#edit_id').val(data[11]);
		      $('#editFname').val(data[0]);			  
			  $('#editMname').val(data[1]); 
			  $('#editLname').val(data[2]); 
			  $('#editGender').val(data[3]); 
			  $('#editBday').val(data[4]);
			  $('#editAddress').val(data[5]);
			  $('#editCity').val(data[6]);
			  $('#editProvince').val(data[7]);
			  $('#editPostalcode').val(data[8])
			  $('#editEmail').val(data[13]);
			  $('#editPhoneno').val(data[14]);
			  $('#editDept').val(data[16]);
			  $('#editcurrentPassword').val(data[17]);

			var x = document.getElementById("editPosition");
		    var y = document.getElementById("editDept");

			x.innerHTML = "";
			var dept = y.value;

			var dept = document.getElementById("editDept").value;
			

			if(dept == "Human Resources"){
			// Create options for Human Resources positions
			var option1 = document.createElement("option");
			option1.text = "Human Resource Admin";
			x.appendChild(option1);

			var option2 = document.createElement("option");
			option2.text = "Human Resource Associate";
			x.appendChild(option2);
			$('#editPosition').val(data[15]);
		  }
		  else if(dept == "Information Technology"){
			// Create options for IT positions
			var option1 = document.createElement("option");
			option1.text = "IT Admin";
			x.appendChild(option1);

			var option2 = document.createElement("option");
			option2.text = "IT Analyst";
			x.appendChild(option2);

			var option3 = document.createElement("option");
			option3.text = "IT Project Manager";
			x.appendChild(option3);

			var option4 = document.createElement("option");
			option4.text = "Network Engineer";
			x.appendChild(option4);
			$('#editPosition').val(data[15]);
		  }
		  else if(dept == "Marketing"){
			// Create options for Marketing positions
			var option1 = document.createElement("option");
			option1.text = "Marketing Associate";
			x.appendChild(option1);

			var option2 = document.createElement("option");
			option2.text = "Marketing Manager";
			x.appendChild(option2);
			$('#editPosition').val(data[15]);
		  }
		  else if(dept == "Operations"){
			// Create an option for an Operations position
			var option1 = document.createElement("option");
			option1.text = "Customer Representative";
			x.appendChild(option1);
			$('#editPosition').val(data[15]);
		  }
		  else{
			// If no department is selected, only display the default "Choose..." option
		  }
			  
        });

      });


    </script>
      <!-- JS For Department Selected -->
	<script>
	  document.getElementById("editmodal").addEventListener("shown.bs.modal", clearOptions);
	</script>

	<script>
		function clearOptions() {
        var x = document.getElementById("editPosition");
		var y = document.getElementById("editDept");

			x.innerHTML = "";
			var dept = y.value;

			var dept = document.getElementById("editDept").value;
			

			if(dept == "Human Resources"){
			// Create options for Human Resources positions
			var option1 = document.createElement("option");
			option1.text = "Human Resource Admin";
			x.appendChild(option1);

			var option2 = document.createElement("option");
			option2.text = "Human Resource Associate";
			x.appendChild(option2);
		  }
		  else if(dept == "Information Technology"){
			// Create options for IT positions
			var option1 = document.createElement("option");
			option1.text = "IT Admin";
			x.appendChild(option1);

			var option2 = document.createElement("option");
			option2.text = "IT Analyst";
			x.appendChild(option2);

			var option3 = document.createElement("option");
			option3.text = "IT Project Manager";
			x.appendChild(option3);

			var option4 = document.createElement("option");
			option4.text = "Network Engineer";
			x.appendChild(option4);
		  }
		  else if(dept == "Marketing"){
			// Create options for Marketing positions
			var option1 = document.createElement("option");
			option1.text = "Marketing Associate";
			x.appendChild(option1);

			var option2 = document.createElement("option");
			option2.text = "Marketing Manager";
			x.appendChild(option2);
		  }
		  else if(dept == "Operations"){
			// Create an option for an Operations position
			var option1 = document.createElement("option");
			option1.text = "Customer Representative";
			x.appendChild(option1);
		  }
		  else{
			// If no department is selected, only display the default "Choose..." option
		  }

      }
	</script>


	

    <script>
                function valueReceiver(){
                    var b = localStorage.getItem("idValue");
                    alert("The Value Received is " + b);
                    var resetValue =0;
                    localStorage.setItem("idValue", resetValue);
                }


                function valueSenderIndex()
                {
                var a=<?php echo $id; ?>;
                // alert(<?php echo $id; ?>);
                localStorage.setItem("idValue", a);
                window.location.href="index.php<?php echo '?$id_emp='. $id;?>";
                }

                function valueSenderCharts()
                {
                var a=<?php echo $id; ?>;
                // alert(<?php echo $id; ?>);
                localStorage.setItem("idValue", a);
                window.location.href="charts.php<?php echo '?$id_emp='. $id;?>";
                }
				
                
            </script>
			
	<script>
			function sortFunction(){
			  var input, filter, table, tr, td, i;
			  input = document.getElementById("sortTable");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
				  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}       
			  }
			}
	
	</script>
	
	<script>
	function validateForm() {
		var fname = document.forms["addForm"]["fname"].value;
		
		if (fname == "") {
			alert("First Name must be filled out");
			return false;
		}
		
		var lname = document.forms["addForm"]["lname"].value;
		if (lname == "") {
			alert("Last Name must be filled out");
			return false;
		}
		
		var gender = document.getElementById('inputGender');
		var genderInvalid = gender.value == "";
	 
		if (genderInvalid) {
			alert('Please select a Gender');
			return false;
		}
		
		var dateInput = document.getElementById("bday").value;
		if (dateInput == "") {
			alert("Please select a Birth Date.");
			return false;
		}
		
		var email = document.forms["addForm"]["email"].value;
		if (email == "") {
			alert("Email must be filled out");
			return false;
		}
		
		var fileInput = document.getElementById("fileToUpload").files;
		if (fileInput.length == 0) {
			alert("Please select a Profile Picture to upload.");
			return false;
		}
		
		var phoneno = document.forms["addForm"]["phoneno"].value;
		if (phoneno == "") {
			alert("Phone Number must be filled out");
			return false;
		}
		
		var address = document.forms["addForm"]["address"].value;
		if (address == "") {
			alert("Address must be filled out");
			return false;
		}
		
		var city = document.forms["addForm"]["city"].value;
		if (city == "") {
			alert("City must be filled out");
			return false;
		}
		
		var province = document.forms["addForm"]["province"].value;
		if (province == "") {
			alert("Province must be filled out");
			return false;
		}
		
		var postalcode = document.forms["addForm"]["postalcode"].value;
		if (postalcode == "") {
			alert("Postal Code must be filled out");
			return false;
		}
		
		var department = document.getElementById('department');
		var deptInvalid = department.value == "";
	 
		if (deptInvalid) {
			alert('Please select a Department');
			return false;
		}
		
		var position = document.getElementById('position');
		var positionInvalid = position.value == "Choose...";
	 
		if (positionInvalid) {
			alert('Please select a Position');
			return false;
		}
		
		var id_emp = document.forms["addForm"]["id_emp"].value;
		if (id_emp == "") {
			alert("Employee ID must be filled out");
			return false;
		}
		
		var password = document.forms["addForm"]["password"].value;
		if (password == "") {
			alert("Password must be filled out");
			return false;
		}
		
		
	}
	</script>
      

  </body>
</html>
