      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/datatables/dataTables.bootstrap.css">
      <!-- DataTables -->
      <script src="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script>
        $(function() {
          $("#example1").DataTable();
        });
      </script>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Order Management

          </h1>
          <h3 class="box-title suc_msg_hide"><?php echo $this->session->flashdata('suc_msg');?></h3>
          <ol class="breadcrumb">

            <!-- <li style="margin-right: 10px;margin-top: -8px;">
              <a href="<?php echo base_url() . 'Admin/addUserAlbum'; ?>"> <button class="btn btn-primary btn-sml">Add</button> </a>
            </li> -->


          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">


              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="col-xs-1">No.</th>
                        <th class="col-xs-2">Full Name</th>
                        <th class="col-xs-1">Mobile No</th>
                        <th class="col-xs-1">Assigned To</th>
                        <th class="col-xs-1">Payment</th>
                        <th class="col-xs-1">Payment Mode</th>
                        <th class="col-xs-1">Vehicle</th>
                        <th class="col-xs-1">Status</th>
                        <th class="col-xs-1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($result)) { ?>
                        <?php $i = 1;
                        foreach ($result as $key => $row) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo str_replace('"', '', $row['Name']); ?></td>
                            <td><?php echo str_replace('"', '', $row['Mobile']); ?></td>
                            <td><?php echo str_replace('"', '', isset($row['Assigned to']) ? $row['Assigned to'] : ''); ?></td>
                            <td><?php echo str_replace('"', '', $row['Payment']); ?></td>

                            <td><?php echo str_replace('"', '', $row['Payment Mode']); ?></td>
                            <td><?php echo str_replace('"', '', $row['Vehicle']); ?></td>

                            <td><?php echo str_replace('"', '', isset($row['Status']) ? $row['Status'] : ''); ?></td>
                            <td>
                              <?php if(!isset($row['Assigned to'])){?>
                                <button onclick="openModel(<?php echo $key;?>)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Assigne</button>
                              <?php } ?>
                              
                              
                            </td>
                          </tr>
                        <?php $i++;
                        } ?>
                      <?php } ?>

                    </tbody>
                    <tfoot>
                      <th class="col-xs-1">No.</th>
                      <th class="col-xs-2">Full Name</th>
                      <th class="col-xs-1">Mobile No</th>
                      <th class="col-xs-1">Assigned To</th>
                      <th class="col-xs-1">Payment</th>
                      <th class="col-xs-1">Payment Mode</th>
                      <th class="col-xs-1">Vehicle</th>
                      <th class="col-xs-1">Status</th>
                      <th class="col-xs-1">Action</th>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->

      <div class="modal fade" id="exampleModal" >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

          <form id="frm_user_album_add" class="form-horizontal" method="post" action="<?php echo base_url() . 'Admin/assignDriver'; ?>">


            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Driver Name</h5>

              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Driver</label>

                  
                  <div class="col-sm-10">
                    <select class="form-control" name="selected_driver">
                      <?php if ($drivers) { ?>
                        <option value="">Select Driver</option>
                        <?php foreach ($drivers as $key => $row) { ?>
                          <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                        <?php } ?>
                      <?php } ?>

                    </select>
                    <?php echo form_error('selected_driver'); ?>
                  </div>

                  <div class="col-sm-10">
                    <input id="order_id" name="order_id" value=""  type="hidden" class="form-control">
                    <?php echo form_error('order_id'); ?>
                  </div>

                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="submit" name="submit" class="btn btn-primary">Assign Driver</button>
              </div>
            </div>

          </form>
        </div>
      </div>

      <script>
        
        function openModel(order_id) {
          $("#order_id").val(order_id)
          var popup = document.getElementById("exampleModal");
          popup.classList.toggle("show");
        }
      </script>