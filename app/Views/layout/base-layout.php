<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>NeatTransport| <?=$title;?></title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?=base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?=base_url();?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>assets/admin/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!--	datatables-->
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
		</ul>

		<!-- SEARCH FORM -->
		<form class="form-inline ml-3">
			<div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-navbar" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</form>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="fas fa-power-off"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<div class="dropdown-divider"></div>
					<a href="<?=base_url('logout');?>" class="dropdown-item">
						<i class="fas fa-sign-out-alt mr-2"></i>LOGOUT &nbsp;<?=$_SESSION['t_username'];?>
					</a>
					<a href="<?=base_url('profile');?>" class="dropdown-item">
						<i class="fas fa-user-cog mr-2"></i>My profile
					</a>
				</div>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="<?= base_url('index') ?>" class="brand-link">
			<img src="<?= base_url();?>assets/img/logo2.png" alt="Logo" class="brand-image  elevation-3"
				 style="opacity: .8; width:50%;height: 100%">
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?= base_url();?>assets/img/user.png" class="img-circle elevation-2" alt="User Image" style="border-radius: 50px;width: 50px;height: 50px;">
				</div>
				<div class="info">
					<a href="#" class="d-block" style="font-size: 25px;"><?=$_SESSION['t_username'];?></a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
					<li class="nav-item has-treeview menu-open">
						<a href="#" class="nav-link active">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url('dashboard');?>" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Dashboard</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview menu-open">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-user-cog"></i>
							<p>
								Users
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url('users')?>" class="nav-link">
									<i class="far fa-user nav-icon"></i>
									<p>Users</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview menu-open">
						<a href="#" class="nav-link">
							<i class="fas fa-list"></i>
							<p>
								Products
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url('product')?>" class="nav-link">
									<i class="fas fa-list fa-sm"></i>
									<p>Products</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview menu-open">
						<a href="#" class="nav-link">
							<i class="fa fa-recycle"></i>
							<p>
								Requests
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= base_url('requests')?>" class="nav-link">
									<i class="fa fa-reply-all"></i>
									<p>View requests</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview menu-open">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-envelope"></i>
							<p>
								Emails
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="fas fa-envelope"></i>
									<p>Email messages</p>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"><?= $title;?></h1>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>

		<!-- /.content-header -->

		<!-- Main content -->
			<?= $data;?>
		<!-- /.content -->
	</div>

	<!-- Main Footer -->
	<footer class="main-footer">
		<strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script>  Neat transport</strong>
		All rights reserved.
		<div class="float-right d-none d-sm-inline-block">
			<b>Version</b> 3.0.3
		</div>
	</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?=base_url();?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url();?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/admin/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url();?>assets/admin/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=base_url();?>assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url();?>assets/admin/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url();?>assets/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url();?>assets/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url();?>assets/admin/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?=base_url();?>assets/admin/dist/js/pages/dashboard2.js"></script>
<!--datatable-->
<script src="<?=base_url();?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
</body>
</html>
<script>
	$(function () {
		// $('.select2').select2();
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	})
</script>
