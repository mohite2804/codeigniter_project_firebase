<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url().ADMIN_CSS_JS;?>bootstrap/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().ADMIN_CSS_JS;?>dist/css/AdminLTE.min.css">
    

    
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="javascript:void(0)"><b>Admin</b> Login</a>
      </div>
      <div class="login-box-body">
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->
        <h3 class="box-title suc_msg_hide"><?php echo $this->session->flashdata('suc_msg');?></h3>
        <form action="<?php echo base_url();?>Login/submitLogin" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="email"  id="email" class="form-control" placeholder="User Name">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password"  id="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div> 
          </div>
        </form>
		<!-- <a href="#">I forgot my password</a><br>-->
        
      </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url().ADMIN_CSS_JS;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url().ADMIN_CSS_JS;?>bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>


<script>
  $(document).ready(function() {
    $('.suc_msg_hide').delay(5000).fadeOut('slow');
  });
  
</script>
