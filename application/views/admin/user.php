<?php include('decoration/header.php');?>

<!-- start: Content -->
<div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url(); ?>admin/admin/index"">Home</a> 
                <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Table User</a></li>
        </ul>
        <ul style="margin-left: -1px;">
            <a href="<?php echo base_url();?>admin/admin/add_user" class="btn btn-md btn-success" role="button">
                <i class="halflings-icon white plus"></i>Add User
            </a>
        </ul>
        <div class="control-group">
        <div class="controls">
            <div class="input-append">
                <input id="appendedInputButtons" size="16" type="text">
                <button class="btn btn-primary" type="button">Search</button>
            </div>
        </div>
        </div>
        <?php
            if($this->session->flashdata('save')) { ?>
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>                    <strong>Sukses!</strong> Data Berhasil Ditambahkan
                </div>
        <?php } else if($this->session->flashdata('update')) { ?>
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> Data Berhasil Diperbaharui
                </div>
        <?php } else if($this->session->flashdata('delete')) { ?>
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> Data Berhasil Dihapus
            </div>
        <?php } ?>
        <div class="row-fluid sortable">  
                <div class="box span12">
                    <div class="box-header">
                        <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Table User</h2>
                        <div class="box-icon">
                            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                    <div style="overflow-x: auto;">
                        <table class="table table-striped table-bordered" class="table table-striped">
                              <thead>
                                  <tr>
                                    <th style="text-align:center;">ID</th>
                                    <th style="text-align:center;">Name</th> 
                                    <th style="text-align:center;">Email</th>
                                    <th style="text-align:center;">Username</th>
                                    <th style="text-align:center;">Level</th>
                                    <th style="text-align:center;">Action</th>
                                  </tr>
                              </thead>   
                              <tbody>
                                    <?php foreach ($user as $usr): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $usr->user_id ?></td>
                                    <td><?= $usr->user_name ?></td>
                                    <td><?= $usr->user_email ?></td>
                                    <td><?= $usr->username ?></td>
                                    <td><?= $usr->user_level ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo base_url();?>admin/admin/edit_user/<?php echo $usr->user_id;?>" class="btn btn-xs btn-primary" role="button" title="ubah">
                                        <i class="halflings-icon white edit"></i></a>&nbsp;
                                        <a href="<?php echo base_url();?>admin/admin/delete_user/<?php echo $usr->user_id;?>" onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-xs btn-danger" role="button" title="hapus"><i class="halflings-icon white trash"></i></a> 
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
        </div>
    </div><!--/span-->
</div><!--/row-->

<div class="clearfix"></div>    
<?php include('decoration/footer.php');?>