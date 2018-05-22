<?php include('decoration/header.php');?>

			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url(); ?>admin/admin/index"">Home</a> 
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Profil</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Profile User</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<?php 
							foreach ($user as $us) {
						?>
						<table class="table">
							  <thead>
								  <tr>
									  <th>ID User</th>
									  <th>Name</th>
									  <th>Email</th>
									  <th>Username</th>
									  <th>Level</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td><?php echo $us->user_id; ?></td>
									<td class="center"><?php echo $us->user_name; ?></td>
									<td class="center"><?php echo $us->user_email; ?></td>
									<td class="center"><?php echo $us->username; ?></td>
									<td class="center">
										<span class="label label-success"><?php echo $us->user_level; ?></span>
									</td>                                       
								</tr>                       
							  </tbody>
						 </table>  
						<?php } ?>
					</div>
				</div><!--/span-->

			</div><!--/row-->

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

<div class="clearfix"></div>    
<?php include('decoration/footer.php');?>
