<?php
include_once 'header.php';

?>
  <body class="bg-dark">
    <div id="wrapper">
      <!-- Sidebar -->
     <?php include 'sidebar.php';?>
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
                  <div class="card-header">create A events</div>
                  <div class="card-body">
                    <div id="success"></div>
                    <form id="form" action="createevent.php"  method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <div class="form-label-group">
                          <input type="text" id="eventname" class="form-control" placeholder="Event Name" required="required" autofocus="autofocus" name="eventname">
                          <label for="eventname" class="control-label">Event Name</label>
                          
                         </div>
                       </div>
                        <div class="form-group control-group">
                          <div class="form-label-group">
                         <label for="upload_image"></label>
                         <input type="file" name="image" class="form-control-file" id="upload_image">
                         </div>
                       </div>
                       <div class="form-group">
                        <div class="form-label-group">
                          <textarea id="eventarticle" class="form-control" name="eventarticle" placeholder="Say Something" required="required"></textarea>
                          <label for="eventarticle"></label>
                        </div>
                      </div>
                     
                      <input class="btn btn-primary btn-block" type="submit" value="Upload">
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
       <script>
        $(document).ready(function (e) {
        $("#form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
        url: "createevent.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend : function()
        {
        //$("#preview").fadeOut();
        $("#err").fadeOut();
        },
        success:function(){
        $("#form")[0].reset();
        $('#success').html("<div class='alert alert-success'>");
          $('#success>.alert-success')
          .append("<strong>New event added on the list.</strong>");
          $('#success>.alert-success')
        .append('</div>');
        $('#contact').trigger("reset");
        },
        //success message generate korbea
        error:function(){
        $('#success').html("<div class='alert alert-danger'>");
          $('#success>.alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
          $('#success>.alert-danger')
          .append("<strong>Error,Contact with administrator.</strong>");
          $('#success>.alert-danger')
        .append('</div>');
        $('#form').trigger("reset");
        }
        });
        }));
        });
       </script>
      </body>
    </html>