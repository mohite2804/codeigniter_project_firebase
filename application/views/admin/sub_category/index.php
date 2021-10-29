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
            Category

          </h1>
          <h3 class="box-title suc_msg_hide"><?php echo $this->session->flashdata('suc_msg');?></h3>
          <ol class="breadcrumb">

            <li style="margin-right: 10px;margin-top: -8px;">
              <a href="<?php echo base_url() . 'Admin/addSubCategory'; ?>"> <button class="btn btn-primary btn-sml">Add</button> </a>
            </li>


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
                        <th class="col-xs-6">Category Name</th>
                        <th class="col-xs-6">Sub Category Name</th>
                        <th class="col-xs-6">Charges</th>
                        <th class="col-xs-6">Image</th>                        
                        <th class="col-xs-6">Description</th>

                        <th class="col-xs-1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($result)) { ?>
                        <?php $i = 1;
                        foreach ($result['subcategories'] as $key => $row) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo str_replace('"', '', $row[0]); ?></td>
                            <td><?php echo str_replace('"', '', $row[1]); ?></td>
                            <td><?php echo str_replace('"', '', $row[2]); ?></td>
                           
                           
                            <td><image src="<?php echo str_replace('"', '', $row[3]); ?>" /></td>
                            <td><?php echo str_replace('"', '', $row[4]); ?></td>
                            <td>
                            <a title="Delete Category" onclick="return confirm('Are you sure you want to delete?')" href="<?php echo base_url().'Admin/removeSubCategory/'.  base64_encode(urlencode(str_replace('"', '', $row[0]))).'/'.base64_encode(urlencode(str_replace('"', '', $row[1]))) ;?>" ><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                          </tr>
                        <?php $i++;
                        } ?>
                      <?php } ?>

                    </tbody>
                    <tfoot>
                      <th class="col-xs-1">No.</th>
                      <th class="col-xs-6">Category Name</th>
                      <th class="col-xs-6">Sub Category Name</th>
                      <th class="col-xs-6">Charges</th>
                      <th class="col-xs-6">Image</th>                     
                      <th class="col-xs-6">Description</th>

                      <th class="col-xs-1">Action</th>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->