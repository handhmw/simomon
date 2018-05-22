<?php include('decoration/header.php');?>

<!-- start: Content -->
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
		<i class="icon-home"></i>
		<a href="<?php echo base_url(); ?>subadmin/subadmin/index">Home</a>  
		<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Table Log Email</a></li>
	</ul>
	<div class="control-group">
		<div class="controls">
			<div class="input-append">
				<input id="appendedInputButtons" size="16" type="text"><button class="btn btn-primary" type="button">Search</button>
			</div>
		</div>
	</div>
	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white envelope"></i><span class="break"></span>Email</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<div style="overflow-x: auto;">
						<table class="table table-striped table-bordered table-condensed">
						  <thead>
							  <tr>
								    <th style="text-align:center;">No.</th>
								    <th style="text-align:center;">ID User</th>
                          			<th style="text-align:center;">Host Name</th>
                          			<th style="text-align:center;">IP Host</th>
                          			<th style="text-align:center;">Date</th>
                          			<th style="text-align:center;">Hour</th>
                          			<th style="text-align:center;">Status</th>
                          			<th style="text-align:center;">Action</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php 
								$no = 1;
								foreach($logs as $log ): ?>
					
								<tr>
								<td style="text-align:center;"><?php echo $no++ ?></td>
								<td><?= $this->session->userdata('id') ?></td>
								<td><?= $log->device_name ?></td>
								<td><?= $log->device_ip ?></td>
								<td><?= $log->date_log ?></td>
								<td><?= $log->hour_log ?>.00 WIB</td>
								<td><?= $log->device_status ?></td>
								</td>
								<td style="text-align: center;">
                                    <a href="<?php echo base_url();?>subadmin/subadmin/delete_log/<?php echo $log->id_log;?>" onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-xs btn-danger" role="button" title="hapus"><i class="halflings-icon white trash"></i></a> 
                                </td>
							</tr>
							<?php endforeach; ?>
							
						  </tbody>
					  </table>      
					  </div>   
					  <div class="pagination pagination-centered">
			            <ul>
			                <?php echo $pagination ?>
			            </ul>
        			</div>    
					</div>
				</div><!--/span-->
			</div><!--/row-->
	</div><!--/.fluid-container-->
	
<div class="clearfix"></div>
	
<?php include('decoration/footer.php');?>