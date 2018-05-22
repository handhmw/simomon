<?php include('decoration/header.php');?>

	<!-- start: Content -->
	<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>admin/admin/index"">Home</a> 
			<i class="icon-angle-right"></i>
			</li>
			<li><a href="#">Table Location</a></li>
		</ul>

	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white Add"></i><span class="break"></span>Location</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>ID</th>
                          	<th>Location Name</th>
                          	<th>Email</th>
                          	<th>Address</th>
                          	<th>Action</th>
						</tr>
					</thead>   
					<tbody>
						<tr>
							<td>LC01</td>
							<td>Lab. Komputer</td>
							<td class="center">handh@gmail.com</td>
							<td class="center">Jl. Glagah</td>
							<td class="center">
							    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#myModal-add">
							    <i class="halflings-icon white zoom-in"></i>  
							    </a>
							    <a class="btn btn-info" href="#" data-toggle="modal" data-target="#myModal-edit">
								<i class="halflings-icon white edit"></i>  
								</a>
								<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#myModal-delete">
								<i class="halflings-icon white trash"></i> 
								</a>
							</td>
							</tr>
						<tr>
							<td>LC02</td>
							<td>Lab. Komputer</td>
							<td class="center">handh@gmail.com</td>
							<td class="center">Jl. Glagah</td>
							<td class="center">
								<a class="btn btn-success" href="#" data-toggle="modal" data-target="#myModal-add">
								<i class="halflings-icon white zoom-in"></i>  
								</a>
								<a class="btn btn-info" href="#" data-toggle="modal" data-target="#myModal-edit">
								<i class="halflings-icon white edit"></i>  
								</a>
								<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#myModal-delete">
								<i class="halflings-icon white trash"></i> 
								</a>
							</td>
							</tr>
					</tbody>
				</table>            
			</div>
		</div><!--/span-->
	</div><!--/row-->
</div><!--/.fluid-container-->
	
<!-- end: Content -->

	</div><!--/#content.span10-->
	</div><!--/fluid-row-->
		
<div class="modal hide fade" id="myModal-add">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Add Location</h3>
		</div>
		<div class="modal-body">
				<form class="form-horizontal">
						<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">ID</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Location Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="Email">
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="textarea2">Address</label>
							  <div class="controls">
								<textarea class="input-xlarge focused" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button>
								<button class="btn">Cancel</button>
							  </div>
						</fieldset>
				</form>
		</div>
	</div>

	<div class="modal hide fade" id="myModal-edit">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Edit Location</h3>
		</div>
		<div class="modal-body">
				<form class="form-horizontal">
						<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">ID</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Location Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="Email">
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="textarea2">Address</label>
							  <div class="controls">
								<textarea class="input-xlarge focused" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Update</button>
								<button class="btn">Cancel</button>
							  </div>
						</fieldset>
				</form>
		</div>
	</div>

	<div class="modal hide fade" id="myModal-delete">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h2>Warning!</h2>
		</div>
		<div class="modal-body">
			<p><h4>Apakah Anda Ingin Menghapus Location?</h4></p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-danger">Delete</a>
			<a href="#" class="btn" data-dismiss="modal">Cancel</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
<?php include('decoration/footer.php');?>