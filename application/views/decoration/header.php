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
				<a class="brand" href="<?php echo base_url(); ?>index.php"><span>JANCUX</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- <li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red">
								7 </span>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 11 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">1 min</span> 
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>	
							</ul>
						</li> -->
						<!-- start: Notifications Dropdown -->
						<!-- <li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-calendar"></i>
								<span class="badge red">
								5 </span>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">iOS Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>	
							</ul>
						</li> -->
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<!-- <li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope"></i>
								<span class="badge red">
								4 </span>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="<?php echo base_url(); ?>assets/img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li> -->
						
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
								<li><a href="#" data-toggle="modal" data-target="#myModal-profile"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="#"><i class="halflings-icon off"></i> Logout</a></li>
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
			<li><a href="<?php echo base_url(); ?>home/index"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
			<li>
			<li><a href="<?php echo base_url(); ?>home/host"><i class="icon-signal"></i><span class="hidden-tablet"> Host</span></a></li>	
			<li><a href="<?php echo base_url(); ?>home/device"><i class="icon-phone"></i><span class="hidden-tablet"> Device</span></a></li>
			<li><a href="<?php echo base_url(); ?>home/active"><i class="icon-eye-open"></i><span class="hidden-tablet"> Active Request</span></a></li>
			<li><a href="<?php echo base_url(); ?>home/user"><i class="icon-user"></i><span class="hidden-tablet"> User</span></a></li>	
			<li><a href="<?php echo base_url(); ?>home/log"><i class="icon-envelope"></i><span class="hidden-tablet"> Log Email</span></a></li>
			<li><a href="<?php echo base_url(); ?>home/report"><i class="icon-print"></i><span class="hidden-tablet"> Report</span></a></li>
			</ul>
			</div>
			</div>

			<!-- end: Main Menu -->

		<div class="modal hide fade" id="myModal-profile">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Profile</h3>
		</div>
		<div class="modal-body">
				<form class="form-horizontal">
						<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">First Name</label>
								<div class="controls">
								  <input class="input-xlarge uneditable-input" id="focusedInput" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Last Name</label>
								<div class="controls">
								  <input class="input-xlarge uneditable-input" id="focusedInput" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Email</label>
								<div class="controls">
								  <input class="input-xlarge uneditable-input" id="focusedInput" type="Email">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Username</label>
								<div class="controls">
								  <input class="input-xlarge uneditable-input" id="focusedInput" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Level</label>
								<div class="controls">
								  <input class="input-xlarge uneditable-input" id="focusedInput" type="text">
								</div>
							  </div>
						</fieldset>
			</form>
		</div>
	</div>