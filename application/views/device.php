<?php include ('decoration/header.php');?>
		
<!-- start: Content -->
	<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url(); ?>home/index"">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Table Device</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white phone"></i><span class="break"></span>Device</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="mydata">
								<thead>
									<tr>
										<th>ID</th>
										<th>Device Name</th>
										<th>Operating System</th>
                    					<th>IP Host</th>
                    					<th>Subnet Mask</th>
                    					<th>MAC Address</th>
                    					<th>Location</th>
										<th style="text-align: right;">Aksi</th>
										
									</tr>
								</thead>
								<tbody id="show_data">
				
								</tbody>
						</table>          
					</div>
				</div><!--/span-->
			</div><!--/row-->
	</div><!--/.fluid-container-->
	
<!-- end: Content -->
	
	</div><!--/#content.span10-->
	</div><!--/fluid-row-->
		





		<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Add Device</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-9">
                            <input name="dev_id" id="id_device" class="form-control" type="text" placeholder="ID" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Device Name</label>
                        <div class="col-xs-9">
                            <input name="dev_name" id="name_device" class="form-control" type="text" placeholder="Device Name" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Operating System</label>
                        <div class="col-xs-9">
                            <input name="dev_os" id="os_device" class="form-control" type="text" placeholder="Operating System" style="width:335px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >IP Host</label>
                        <div class="col-xs-9">
                            <input name="dev_ip" id="ip_device" class="form-control" type="text" placeholder="IP Host" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Subnet Mask</label>
                        <div class="col-xs-9">
                            <input name="dev_subnet" id="subnet_device" class="form-control" type="text" placeholder="Subnet Mask" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >MAC Address</label>
                        <div class="col-xs-9">
                            <input name="dev_mac" id="mac_device" class="form-control" type="text" placeholder="MAC Address" style="width:335px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Location</label>
                        <div class="col-xs-9">
                            <input name="dev_location" id="location_device" class="form-control" type="text" placeholder="Location" style="width:335px;" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Device</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-9">
                            <input name="dev_id_edit" id="id_device2" class="form-control" type="text" placeholder="ID" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Device Name</label>
                        <div class="col-xs-9">
                            <input name="dev_name_edit" id="name_device2" class="form-control" type="text" placeholder="Device Name" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Operating System</label>
                        <div class="col-xs-9">
                            <input name="dev_os_edit" id="os_device2" class="form-control" type="text" placeholder="Operating System" style="width:335px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >IP Host</label>
                        <div class="col-xs-9">
                            <input name="dev_ip_edit" id="ip_device2" class="form-control" type="text" placeholder="IP Host" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Subnet Mask</label>
                        <div class="col-xs-9">
                            <input name="dev_subnet_edit" id="subnet_device2" class="form-control" type="text" placeholder="Subnet Mask" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >MAC Address</label>
                        <div class="col-xs-9">
                            <input name="dev_mac_edit" id="mac_device2" class="form-control" type="text" placeholder="MAC Address" style="width:335px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Location</label>
                        <div class="col-xs-9">
                            <input name="dev_location_edit" id="location_device2" class="form-control" type="text" placeholder="Location" style="width:335px;" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Device</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus device ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->



<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_device();	//pemanggilan fungsi tampil device.
		$('#mydata').dataTable();
		 
		//fungsi tampil device
		function tampil_data_device(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo base_url()?>index.php/device/data_device',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].device_id+'</td>'+
		                        '<td>'+data[i].device_name+'</td>'+
		                        '<td>'+data[i].device_os+'</td>'+
                                '<td>'+data[i].device_ip+'</td>'+
                                '<td>'+data[i].device_subnet+'</td>'+
                                '<td>'+data[i].device_mac+'</td>'+
                                '<td>'+data[i].device_location+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].device_id+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].device_id+'">Hapus</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/device/get_device')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(device_id,device_name,device_os,device_ip,device_subnet,device_mac,device_location){
                    	$('#ModalaEdit').modal('show');
            			$('[name="dev_id_edit"]').val(data.device_id);
            			$('[name="dev_name_edit"]').val(data.device_name);
            			$('[name="dev_os_edit"]').val(data.device_os);
                        $('[name="dev_ip_edit"]').val(data.device_ip);
                        $('[name="dev_subnet_edit"]').val(data.device_subnet);
                        $('[name="dev_mac_edit"]').val(data.device_mac);
                        $('[name="dev_location_edit"]').val(data.device_location);
            		});
                }
            });
            return false;
        });


		//GET HAPUS
		$('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

		//Simpan Device
		$('#btn_simpan').on('click',function(){
            var dev_id       =$('#id_device').val();
            var dev_name     =$('#name_device').val();
            var dev_os       =$('#os_device').val();
            var dev_ip       =$('#ip_device').val();
            var dev_subnet   =$('#subnet_device').val();
            var dev_mac      =$('#mac_device').val();
            var dev_location =$('#location_device').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/device/simpan_device')?>",
                dataType : "JSON",
                data : {dev_id:dev_id, dev_name:dev_name, dev_os:dev_os, dev_ip:dev_ip, dev_subnet:dev_subnet, dev_mac:dev_mac, dev_location:dev_location},
                success: function(data){
                    $('[name="dev_id"]').val("");
                    $('[name="dev_name"]').val("");
                    $('[name="dev_os"]').val("");
                    $('[name="dev_ip"]').val("");
                    $('[name="dev_subnet"]').val("");
                    $('[name="dev_mac"]').val("");
                    $('[name="dev_location"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_device();
                }
            });
            return false;
        });

        //Update Device
		$('#btn_update').on('click',function(){
            var dev_id       =$('#id_device2').val();
            var dev_name     =$('#name_device2').val();
            var dev_os       =$('#os_device2').val();
            var dev_ip       =$('#ip_device2').val();
            var dev_subnet   =$('#subnet_device2').val();
            var dev_mac      =$('#mac_device2').val();
            var dev_location =$('#location_device2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/device/update_device')?>",
                dataType : "JSON",
                data : {dev_id:dev_id, dev_name:dev_name, dev_os:dev_os, dev_ip:dev_ip, dev_subnet:dev_subnet, dev_mac:dev_mac, dev_location:dev_location},
                success: function(data){
                    $('[name="dev_id_edit"]').val("");
                    $('[name="dev_name_edit"]').val("");
                    $('[name="dev_os_edit"]').val("");
                    $('[name="dev_ip_edit"]').val("");
                    $('[name="dev_subnet_edit"]').val("");
                    $('[name="dev_mac_edit"]').val("");
                    $('[name="dev_location_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_device();
                }
            });
            return false;
        });

        //Hapus Device
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/device/hapus_device')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_device();
                    }
                });
                return false;
            });

	});

</script>







	<div class="clearfix"></div>
	
<?php include('decoration/footer.php');?>