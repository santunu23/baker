<?php
include_once 'header.php';

?>
  <body class="bg-dark">
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!--   <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>User Management</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>
          </div>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="usermanagement.php">
            <i class="far fa-user"></i>
            <span>User Management</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tables.html">
              <i class="fas fa-fw fa-table"></i>
              <span>Tables</span></a>
            </li>
          </ul>
          <div id="content-wrapper">
            <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
              </ol>
              <!--  Registers a new users -->
              <div class="container">
                <div class="card card-register mx-auto mt-5">
                  <div class="card-header">Register A volentier</div>
                  <div class="card-body">
                    <div id="success"></div>
                    <form id="form">
                      <div class="form-group control-group">
                        <div class="form-row">
                          <div class="col-md-6">
                            <div class="form-label-group">
                              <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus" data-validation-required-message="You must agree to the terms and conditions" data-validation-regex-regex="^[a-zA-Z]+$" data-validation-regex-message="Name fields should not contain digit" >
                              <label for="firstName" class="control-label">First name</label>
                              <p class="help-block text-danger"></p>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-label-group control-group ">
                              <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required"  data-validation-required-message="You must agree to the terms and conditions" data-validation-regex-regex="^[a-zA-Z]+$" data-validation-regex-message="Name fields should not contain digit">
                              <label for="lastName" class="control-label">Last name</label>
                              <p class="help-block text-danger"></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <div class="form-label-group">
                          <input type="email" id="email" class="form-control" placeholder="Email address" required data-validation-required-message="You must agree to the terms and conditions">
                          <label for="email" class="control-label">Email address</label>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <div class="form-label-group">
                          <input type="password" id="upassword" class="form-control" placeholder="Password" required="required" required data-validation-required-message="You must agree to the terms and conditions">
                          <label for="upassword" class="control-label">Password</label>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <div class="form-label-group">
                          <input type="text" id="mobile" class="form-control" placeholder="Mobile Number" required="required" data-validation-required-message="You must agree to the terms and conditions" min="10" data-validation-regex-regex="\d*" data-validation-regex-message="This field not allow text">
                          <label for="mobile" class="control-label">Mobile Number</label>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="address" class="form-control" placeholder="Address" required="required">
                          <label for="address">Address</label>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-block">submit</button>
                      <button type="submit" onclick="myFunction()" class="btn btn-success btn-block">Get Recent Data</button>
                      <!-- <a class="btn btn-primary btn-block" href="">Register</a> -->
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.container-fluid -->
            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
              Volentiers List</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Join Date</th>
                        <th>Mobile No</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>ID</th>
                      <th>Join Date</th>
                      <th>Mobile No</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      require( __DIR__ . "/db/db.php");
                      $getreport=$DB->query("SELECT * FROM volunteer_list");
                      foreach ($getreport as $value) {
                      echo '<tr>';
                        echo('<td>'.$value['fname'].' '.$value['lname'].'</td>');
                        echo('<td>'.$value['volentierid'].'</td>');
                        echo('<td>'.$value['created_at'].'</td>');
                        echo('<td>'.$value['mobi'].'</td>');
                        echo('<td>'.$value['addre'].'</td>');
                        echo('<td>'.$value['email'].'</td>');
                        echo ('<td><a class="btn btn-danger deletevolentier" style="color:white" id='.$value["volentierid"].'>Delete</a></td>');
                      echo '</tr>';
                      }
                      ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright © Baker 2019</span>
                </div>
              </div>
            </footer>
          </div>
          <!-- /.content-wrapper -->
        </div>
        <div id="volentierremovemodal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Delete Successful</h4>
              </div>
              <div class="modal-body">
                <p>The record succesfully remove from the system</p>
              </div>
              <div class="modal-footer">
                <button type="button" onclick="myFunction()" class="btn btn-success" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="resources/js/jqBootstrapValidation.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="resources/js/sb-admin.min.js"></script>
        <!-- Demo scripts for this page-->
        <script src="resources/js/bakerdatatable.js"></script>
       <script src="resources/js/usermanagement.js"></script>
      </body>
    </html>