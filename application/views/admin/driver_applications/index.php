      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/datatables/dataTables.bootstrap.css">
      <!-- DataTables -->
      <script src="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#example1').DataTable( {
              "scrollX": true
          } );
        });
      </script>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Driver Applications

          </h1>
          <ol class="breadcrumb">

            <!-- <li style="margin-right: 10px;margin-top: -8px;">
              <a href="<?php echo base_url() . 'Admin/sendMessage'; ?>"> <button class="btn btn-primary btn-sml">Send New Message</button> </a>
            </li>
 -->

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
                        <th class="col-xs-1">Driver Name</th>
                        <th class="col-xs-2">Mobile</th>
                        <th class="col-xs-1">Vehicle Category</th>
                        <th class="col-xs-1">Vehicle no</th>
                        <th class="col-xs-1">DRN</th>
                        <th class="col-xs-1">DRN F img</th>
                        <th class="col-xs-1">DRN B img</th>

                        <th class="col-xs-2">Adhar img</th>
                        <th class="col-xs-2">RC F img</th>
                        <th class="col-xs-2">RC B img</th>
                        <th class="col-xs-2">Insurance img</th>
                        <th class="col-xs-2">Bank account no</th>
                        <th class="col-xs-2">IFSC</th>
                        
                        
                        <th class="col-xs-2">Status</th>
                        <th class="col-xs-1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($result)) { ?>
                        <?php $i = 1;
                        foreach ($result as $key => $row) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo str_replace('"', '', $row['Driver Name']); ?></td>
                            <td><?php echo str_replace('"', '', $row['Mobile']); ?></td>
                            <td><?php echo str_replace('"', '', $row['Category']); ?></td>

                            <td><?php echo str_replace('"', '', $row['Vehicle number']); ?></td>

                           

                            <td><?php echo str_replace('"', '', $row['DRN']); ?></td>
                            <td><image style="width: 100px; height:100px;" src="<?php echo str_replace('"', '', $row['DRN F']); ?>" /></td>
                            <td><image style="width: 100px; height:100px;" src="<?php echo str_replace('"', '', $row['DRN B']); ?>" /></td>

                            <td><image style="width: 100px; height:100px;" src="<?php echo str_replace('"', '', $row['Adhar']); ?>" /></td>

                            <td><image style="width: 100px; height:100px;" src="<?php echo str_replace('"', '', $row['RC F']); ?>" /></td>
                            <td><image style="width: 100px; height:100px;" src="<?php echo str_replace('"', '', $row['RC B']); ?>" /></td>

                            <td><image style="width: 100px; height:100px;" src="<?php echo str_replace('"', '', $row['Insurance']); ?>" /></td>
                            
                            <td><?php echo str_replace('"', '', $row['Bank Account']); ?></td>
                            <td><?php echo str_replace('"', '', $row['Bank IFSC']); ?></td>

                            
                           
                            <td><?php echo isset($row['Status']) ?  str_replace('"', '', $row['Status']) : 'Not Approve'; ?></td>
                            <td>
                             <?php if(!isset($row['Status'])){?>
                              <a class="btn btn-primary" title="Approve" onclick="return confirm('Are you sure you want to Approve?')" href="<?php echo base_url().'Admin/approveDriver/'.  base64_encode(urlencode($key)) ;?>" >Approve</a>                           
                             <?php } ?>
                             
                            </td>
                          </tr>
                        <?php $i++;
                        } ?>
                      <?php } ?>

                    </tbody>
                    <!-- <tfoot>
                    <th class="col-xs-1">No.</th>
                        <th class="col-xs-1">Driver Name</th>
                        <th class="col-xs-1">DRN</th>
                        <th class="col-xs-1">Category</th>
                        <th class="col-xs-2">Mobile</th>
                        <th class="col-xs-2">Status</th>
                        <th class="col-xs-1">Action</th>
                    </tfoot> -->
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->