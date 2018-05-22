
<?php include('decoration/header.php');?>
			
<!-- start: Content -->
		<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url(); ?>home/index"">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

<?php include('decoration/navigation.php');?>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Realtime Graphic Monitoring</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="realtimechart" style="height:190px;"></div></br>
						 <p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>
					</div>
				</div>
		    </div><!--/row-->
	</div><!--/.fluid-container-->
	
<!-- end: Content -->
		
	</div><!--/#content.span10-->
	</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Information</h3>
		</div>
		<div class="modal-body">
			<p>This is Graphic Monitoring</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
	</div>
	
	<div class="clearfix"></div>

	
<?php include('decoration/footer.php');?>
