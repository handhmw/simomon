<?php include('decoration/header.php');?>

			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url(); ?>subadmin/subadmin/index">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Device</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Device</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<?php 
							foreach ($device as $dvc) {
						?>
						<form method="post" class="form-horizontal" role="form" action="<?php echo base_url();?>subadmin/subadmin/update_device/<?php echo $dvc->device_id; ?>" class="form-horizontal">
						  <fieldset>
						    <!-- <div class="control-group">
								<label class="control-label">Device ID</label>
								<div class="controls">
								  <span class="input uneditable-input" name="device_id" value="<?php echo $dvc->device_id; ?>"></span>
								</div>
							</div> -->
							<div class="control-group">
							  <label class="control-label" for="typeahead">User ID </label>
							  <div class="controls">
								<input type="text" class="form-control" name="id_user" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);" value="<?php echo $dvc->user_id; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Device ID </label>
							  <div class="controls">
								<input type="text" class="form-control" name="id_device" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);" value="<?php echo $dvc->device_id; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Device Name </label>
							  <div class="controls">
								<input type="text" class="form-control" name="name_device" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);" value="<?php echo $dvc->device_name; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Device OS </label>
							  <div class="controls">
								<input type="text" class="form-control" name="os_device" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);" value="<?php echo $dvc->device_os; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Device IP </label>
							  <div class="controls">
								<input type="text" class="form-control" name="ip_device" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);" value="<?php echo $dvc->device_ip; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Device Subnet </label>
							  <div class="controls">
								<input type="text" class="form-control" name="subnet_device" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);" value="<?php echo $dvc->device_subnet; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Device MAC Address </label>
							  <div class="controls">
								<input type="text" class="form-control" name="mac_device" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);" value="<?php echo $dvc->device_mac; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Device Location </label>
							  <div class="controls">
								<input type="text" class="form-control" name="location_device" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);" value="<?php echo $dvc->device_location; ?>">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  <button type="reset" class="btn btn-success">Refresh</button>
							  <a class="btn btn-danger" href="<?php echo base_url(); ?>subadmin/subadmin/device">Back</a>
							</div>
						  </fieldset>
						</form>   
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
