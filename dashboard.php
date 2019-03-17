<?php
if(!isset($_COOKIE["adminlogin"])) {
header("Location: 404.php");
}
include 'header.php';
?>
<?php  ?>
	<body id="page-top">
		<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
			<a class="navbar-brand mr-1" href="index.html">Donor App</a>
			<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
			</button>
			<!-- Navbar -->
		
		</nav>
		<div id="wrapper">
			<!-- Sidebar -->
			<?php include 'sidebar.php' ?>
					<div id="content-wrapper">
						<div class="container-fluid">
							<!-- Breadcrumbs-->
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="#">Dashboard</a>
								</li>
								<li class="breadcrumb-item active">Overview</li>
							</ol>
							<!-- Icon Cards-->
							<div class="row">
								<div class="col-xl-3 col-sm-6 mb-3">
									<div class="card text-white bg-primary o-hidden h-100">
										<div class="card-body">
											<div class="card-body-icon">
												<i class="fas fa-fw fa-comments"></i>
											</div>
											<div class="mr-5">4 New Event!</div>
										</div>
										<a class="card-footer text-white clearfix small z-1" href="#">
											<span class="float-left">View Details</span>
											<span class="float-right">
												<i class="fas fa-angle-right"></i>
											</span>
										</a>
									</div>
								</div>
								<div class="col-xl-3 col-sm-6 mb-3">
									<div class="card text-white bg-warning o-hidden h-100">
										<div class="card-body">
											<div class="card-body-icon">
												<i class="fas fa-fw fa-list"></i>
											</div>
											<div class="mr-5">11 New Tasks!</div>
										</div>
										<a class="card-footer text-white clearfix small z-1" href="#">
											<span class="float-left">View Details</span>
											<span class="float-right">
												<i class="fas fa-angle-right"></i>
											</span>
										</a>
									</div>
								</div>
								<div class="col-xl-3 col-sm-6 mb-3">
									<div class="card text-white bg-success o-hidden h-100">
										<div class="card-body">
											<div class="card-body-icon">
												<i class="fas fa-fw fa-shopping-cart"></i>
											</div>
											<div class="mr-5">123 New Orders!</div>
										</div>
										<a class="card-footer text-white clearfix small z-1" href="#">
											<span class="float-left">View Details</span>
											<span class="float-right">
												<i class="fas fa-angle-right"></i>
											</span>
										</a>
									</div>
								</div>
								<div class="col-xl-3 col-sm-6 mb-3">
									<div class="card text-white bg-danger o-hidden h-100">
										<div class="card-body">
											<div class="card-body-icon">
												<i class="fas fa-fw fa-life-ring"></i>
											</div>
											<div class="mr-5">13 New Tickets!</div>
										</div>
										<a class="card-footer text-white clearfix small z-1" href="#">
											<span class="float-left">View Details</span>
											<span class="float-right">
												<i class="fas fa-angle-right"></i>
											</span>
										</a>
									</div>
								</div>
							</div>
							<!-- DataTables Example -->
							<div class="card mb-3">
								<div class="card-header">
									<i class="fas fa-table"></i>
								Admin Panel User</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Type</th>
													<th>Created By</th>
													<th>Created Date</th>
													
												</tr>
											</thead>
											<tfoot>
											<tr>
												<th>Name</th>
												<th>Type</th>
												<th>Created By</th>
												<th>Created Date</th>
											</tr>
											</tfoot>
											<tbody>
												
												<?php
												require( __DIR__ . "/db/db.php");
												$getreport=$DB->query("SELECT * FROM user_panel");
												foreach ($getreport as $value) {
												# code...
												echo '<tr>';
													echo('<td>'.$value['user_name'].'</td>');
													echo('<td>'.$value['user_type'].'</td>');
													echo('<td>'.$value['created_by'].'</td>');
													echo('<td>'.$value['created_at'].'</td>');
													
												echo '</tr>';
												}
												?>
												
											</tbody>
										</table>
									</div>
								</div>
								
							</div>
						</div>
						<!-- /.container-fluid -->
						<!-- Sticky Footer -->
						<footer class="sticky-footer">
							<div class="container my-auto">
								<div class="copyright text-center my-auto">
									<span>Copyright © Donor App 2019</span>
								</div>
							</div>
						</footer>
					</div>
					<!-- /.content-wrapper -->
				</div>
				<!-- /#wrapper -->
				<!-- Scroll to Top Button-->
				<a class="scroll-to-top rounded" href="#page-top">
					<i class="fas fa-angle-up"></i>
				</a>
				
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
				
			</body>
		</html>