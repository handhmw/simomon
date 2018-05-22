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
					<a href="#">User</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add User</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form method="post" class="form-horizontal" role="form" action="<?php echo base_url();?>subadmin/subadmin/save_user" class="form-horizontal">
						  <fieldset>
						  	<div class="control-group">
								<label class="control-label">Name ID</label>
								<div class="controls">
								  <span class="input uneditable-input" name="id_user">US-00</span>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name </label>
							  <div class="controls">
								<input type="text" class="form-control" name="name_user" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Email </label>
							  <div class="controls">
								<input type="email" class="form-control" name="email_user" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Username </label>
							  <div class="controls">
								<input type="text" class="form-control" name="username" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Password </label>
							  <div class="controls">
								<input type="password" class="form-control" name="password" required oninvalid="invalidMsg(this);" oninput="invalidMsg(this);">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="selectError3">Level</label>
								<div class="controls">
								  <select name="level_user" id="selectError3">
									<option>Admin</option>
									<option>Subadmin</option>
								  </select>
								</div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn btn-danger">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

<div class="clearfix"></div>    
<?php include('decoration/footer.php');?>
