<?php include('decoration/header.php');?>

<!-- start: Content -->
	<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url(); ?>admin/admin/index"">Home</a> 
			<i class="icon-angle-right"></i>
			</li>
			<li><a href="#">Table Host Status</a></li>
		</ul>
        <!-- <div class="control-group">
        <div class="controls">
            <div class="input-append">
                <input id="appendedInputButtons" size="16" type="text"><button class="btn btn-primary" type="button">Search</button>
            </div>
        </div>
        </div> -->
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white signal"></i><span class="break"></span>Host Status</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                    <div style="overflow-x: auto;">
						<table class="table table-striped table-bordered listHost">
						  <thead>
							  <tr>
							  		<th style="text-align:center;">No.</th>
                                    <th style="text-align:center;">ID User</th>
								    <th style="text-align:center;">Device Name</th>
                          			<th style="text-align:center;">IP Host</th>
                          			<th style="text-align:center;">Subnet</th>
                          			<th style="text-align:center;">Status</th>
                          			<th style="text-align:center;">Detail</th>
							  </tr>
						  </thead>   
						  <tbody id="show_data">
							<?php 
                            $no = 1;
                            foreach ($data_host as $host): ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++ ?></td>
                                    <td><?= $host->user_id ?></td>
                                    <td><?= $host->device_name ?></td>
                                    <td><span id="host_ip"><?= $host->device_ip ?></span></td>
                                    <td><?= $host->device_subnet ?></td>
                                    <td><span id="host_status">status</span></td>
                                   <td style="text-align: center;">
                                        <a href="<?php echo base_url();?>admin/admin/view_detail_host/<?php echo $host->device_id;?>" class="btn btn-xs btn-primary" role="button" title="Detail"><i class="halflings-icon white zoom-in"></i></a>&nbsp;
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
			</div><!--/row-->
	</div><!--/.fluid-container-->
	
<!-- end: Content -->

	</div><!--/#content.span10-->
	</div><!--/fluid-row-->


<style type="text/css">
        .label-danger {
            background: #f44336;
        }
        .label-success {
            background: #59CEA7 !important;
        }
        .label-warning {
            background: #009688;
        }
    </style>
<script>
    var i = 1;
        //console.log("Siap");

    setInterval(function() {
        $('table.listHost > tbody > tr').each(function(index, el) {
                var dom_ip = $.trim($(this).find('#host_ip').text());
                var dom_host_status = $(this).find('#host_status');
                //console.log(dom_ip);
                $.post('<?php echo base_url(); ?>admin/admin/ping', {host_ip: dom_ip}, function(data, textStatus, xhr) {
                    /*optional stuff to do after success */
                    /*console.log("sampe sini");
                    return;*/
                    var ping_status = data[0].ping_status;
                    var status = data[0].status;
                    var msg = data[0].msg;
                    var type = data[0].type;

                    dom_host_status.attr('class', 'label label-' + type);
                    dom_host_status.text(ping_status);
                    console.log(data[0]);
                });
            });
    }, 3000);
    setInterval(function(){
        $.get('<?php echo base_url(); ?>/admin/admin/check_log', function(data) {
            /*optional stuff to do after success */
            console.log(data);
        });
        //console.log('email sent!');
    }, 5000);
</script>


<div class="clearfix"></div>
	
<?php include('decoration/footer.php');?>