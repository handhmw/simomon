
<div class="row-fluid">
	<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
		<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
		<div class="number"> <?php echo $connected ?><i class="icon-arrow-up"></i></div>
		<div class="title">Connected</div>
		<div class="footer">
		<a href="<?php echo base_url(); ?>admin/admin/connected"> Full Report</a>
		</div>	
	</div>
	<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
		<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
		<div class="number"><?php echo $disconnected?><i class="icon-arrow-down"></i></div>
		<div class="title">Disconnected</div>
		<div class="footer">
		<a href="<?php echo base_url(); ?>admin/admin/disconnected"> Full Report</a>
		</div>
	</div>
	<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
		<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
		<div class="number"><?php echo $host_unreachable ?><i class="icon-repeat"></i></div>
		<div class="title">Unreachable</div>
		<div class="footer">
		<a href="<?php echo base_url(); ?>admin/admin/unreachable"> Full Report</a>
		</div>
	</div>
	<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
		<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
		<div class="number"><?php echo $timeout ?><i class="icon-time"></i></div>
		<div class="title">Time Out</div>
		<div class="footer">
		<a href="<?php echo base_url(); ?>admin/admin/rto"> Full Report</a>
		</div>
	</div>	
				
</div>