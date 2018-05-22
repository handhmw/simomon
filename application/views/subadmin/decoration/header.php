<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Network Monitoring System</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
	<!-- end: Favicon -->
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo base_url(); ?>subadmin/subadmin/index"><span>MOMON</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $username; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="<?php echo site_url(); ?>subadmin/subadmin/logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
	<!-- start: Main Menu -->
	<div id="sidebar-left" class="span2">
		<div class="nav-collapse sidebar-nav">
			<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="<?php echo base_url(); ?>subadmin/subadmin/index"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
			<li>
			<li><a href="<?php echo base_url(); ?>subadmin/subadmin/host"><i class="icon-signal"></i><span class="hidden-tablet"> Status</span></a></li>	
			<li><a href="<?php echo base_url(); ?>subadmin/subadmin/device"><i class="icon-phone"></i><span class="hidden-tablet"> Device</span></a></li>	
			<li><a href="<?php echo base_url(); ?>subadmin/subadmin/log"><i class="icon-envelope"></i><span class="hidden-tablet"> Log Email</span></a></li>
			<li><a href="<?php echo base_url().'subadmin/subadmin/profil/'.$this->session->userdata('id'); ?>"><i class="icon-user"></i><span class="hidden-tablet"> Profil</span></a></li>
			</ul>
			</div>
			</div>

			<!-- end: Main Menu -->

	