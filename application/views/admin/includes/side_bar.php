      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>uploads/users/<?php echo $this->session->userdata('admin_session')['user_image']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('admin_session')['user_fullname']; ?></p>

            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less --> 
          <!-- class="active" -->
          <ul class="sidebar-menu">

            <li class="<?php echo ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>" >
              <a href="<?php echo base_url() . 'Admin/dashboard'; ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard   </span> 
              </a>
            </li>

            
            <li class="<?php echo ($this->uri->segment(2) == 'usersManagement') ? 'active' : '' ?>">
              <a href="<?php echo base_url() . 'Admin/usersManagement'; ?>">
                <i class="fa fa-dashboard"></i> <span>Users</span> 
              </a>
            </li>

           

            <li class="<?php echo ($this->uri->segment(2) == 'getCategories') ? 'active' : '' ?>">
              <a href="<?php echo base_url() . 'Admin/getCategories'; ?>">
                <i class="fa fa-dashboard"></i> <span>Add/Remove Services</span>
              </a>
            </li>

            <li  class="<?php echo ($this->uri->segment(2) == 'getSubCategories') ? 'active' : '' ?>">
              <a href="<?php echo base_url() . 'Admin/getSubCategories'; ?>">
                <i class="fa fa-dashboard"></i> <span>Add/Remove Vehicle </span> 
              </a>
            </li>



            <li  class="<?php echo ($this->uri->segment(2) == 'getOrders') ? 'active' : '' ?>">
              <a href="<?php echo base_url() . 'Admin/getOrders'; ?>">
                <i class="fa fa-dashboard"></i> <span>Ongoing Orders</span> 
              </a>
            </li>


            <li  class="<?php echo ($this->uri->segment(2) == 'getDriverApplications') ? 'active' : '' ?>">
              <a href="<?php echo base_url() . 'Admin/getDriverApplications'; ?>">
                <i class="fa fa-dashboard"></i> <span>Driver Applications</span> 
              </a>
            </li>



            
          </ul>
        </section>
      </aside>