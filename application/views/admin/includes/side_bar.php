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
          <ul class="sidebar-menu">

            <li class="active treeview">
              <a href="<?php echo base_url() . 'Admin/dashboard'; ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo base_url() . 'Admin/usersManagement'; ?>">
                <i class="fa fa-dashboard"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

           

            <li class="treeview">
              <a href="<?php echo base_url() . 'Admin/getCategories'; ?>">
                <i class="fa fa-dashboard"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo base_url() . 'Admin/getSubCategories'; ?>">
                <i class="fa fa-dashboard"></i> <span>Subcategory</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>



            <li class="treeview">
              <a href="<?php echo base_url() . 'Admin/getOrders'; ?>">
                <i class="fa fa-dashboard"></i> <span>Orders</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo base_url() . 'Admin/getDriverApplications'; ?>">
                <i class="fa fa-dashboard"></i> <span>Driver Application</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>



            
          </ul>
        </section>
      </aside>