<script src="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/jquery_validation_js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/multiple-select/multiple-select.css" />
<script src="<?php echo base_url() . ADMIN_CSS_JS; ?>plugins/multiple-select/multiple-select.js"></script>
<script>
	$(function() {
		$('.ms').change(function() {
			console.log($(this).val());
		}).multipleSelect({
			width: '100%'
		});
	});
</script>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add Category

		</h1>
		<h3 class="box-title suc_msg_hide"><?php echo $this->session->flashdata('suc_msg');?></h3>
		<a style="float:right; margin-right: 23px;margin-top: -24px;font-size: 20px;" href="<?php echo base_url() . "Admin/getCategories"; ?>"> Back</a>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="col-md-12">
					<!-- Horizontal Form -->
					<div class="box box-info">
						<div class="box-header with-border">
							<!--<h3 class="box-title">Horizontal Form</h3>-->
						</div><!-- /.box-header -->
						<!-- form start -->

						<form id="frm_user_album_add" class="form-horizontal" method="post" enctype="multipart/form-data" action="">

							<div class="box-body">

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Select Category</label>
									<div class="col-sm-10">
										<input name="selected_category" value="" class="form-control">
										<?php echo form_error('selected_category'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input name="category_image" type="file">								
									</div>
								</div>



							</div><!-- /.box-body -->
							<div class="box-footer">

								<button type="submit" value="submit" name="submit" class="btn btn-info pull-right">Save</button>
							</div>
						</form>
					</div><!-- /.box -->
					<!-- general form elements disabled -->

				</div>
				<!--/.col (right) -->



			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->