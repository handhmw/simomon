<?php include('decoration/header.php');?>

<!-- start: Content -->
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
		<i class="icon-home"></i>
		<a href="<?php echo base_url(); ?>admin/admin/index"">Home</a> 
		<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Table Report</a></li>
	</ul>

	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="table-responsive">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white print"></i><span class="break"></span>Report</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">

						<table class="table table-striped table-bordered">
						  <thead>
							  <tr>
								    <th style="text-align:center;">No.</th>
                          			<th style="text-align:center;">Host Name</th>
                          			<th style="text-align:center;">MAC Address</th>
                          			<th style="text-align:center;">Active</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td style="text-align:center;">1.</td>
								<td style="text-align:center;">192.168.2.6</td>
								<td class="center">00:00:00:12</td>
								<td class="center">97%</td>
							</tr>
							<tr>
								<td style="text-align:center;">2.</td>
								<td style="text-align:center;">192.168.12.0</td>
								<td class="center">00:00:00:11</td>
								<td class="center">87%</td>
							</tr>
						  </tbody>
					  </table>        
					 </div>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<button class="btn btn-danger"><i class="halflings-icon white white print"></i> Print</button>
	</div><!--/.fluid-container-->

<!-- end: Content -->

	</div><!--/#content.span10-->
	</div><!--/fluid-row-->
	
	<div class="clearfix"></div>
	
<?php include('decoration/footer.php');?>