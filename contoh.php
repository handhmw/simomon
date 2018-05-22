<table class="table table-striped table-bordered table-condensed">
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
                              <tbody id="show_data">
                                    <?php foreach ($data_user as $usr): ?>
                                <tr>
                                    <td style="text-align: center;"><?= $usr->user_id ?></td>
                                    <td><?= $usr->user_name ?></td>
                                    <td><?= $usr->user_email ?></td>
                                    <td><?= $usr->username ?></td>
                                    <td><?= $usr->user_level ?></td>
                                    <td style="text-align: center;">
                                        <a href="javascript:;" class="btn btn-info btn-xs item_edit" data="<?= $usr->user_id ?>"><i class="halflings-icon white edit"></i></a><a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="<?= $usr->user_id ?>"><i class="halflings-icon white trash"></i></a>
                                    </td>
                                </tr>
                                    <?php endforeach; ?>
                              </tbody>
                         </table>  