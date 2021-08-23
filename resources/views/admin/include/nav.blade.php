<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li> -->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            @if(isset($userdata->photo))
            <img src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" alt="User Image" class="user-image img-circle elevation-2">
            @else
            <img src="<?php echo URL::to('/'); ?>/uploads/profile/test.jpg" alt="User Image" class="user-image img-circle elevation-2">
            @endif
            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>

          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <!-- User image -->
            <li class="user-header bg-primary sa-bg-color2">
              @if(isset($userdata->photo))
              <img src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" alt="User Image" class="user-image img-circle elevation-2">
              @else
              <img src="<?php echo URL::to('/'); ?>/uploads/profile/test.jpg" alt="User Image" class="user-image img-circle elevation-2">
              @endif
              <p>
                {{ Auth::user()->name }}
                <!-- <small>Member since Nov. 2020</small> -->
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?php echo URL::to('/'); ?>/admin/profile" class="btn btn-default btn-flat">Profile</a>

              <a class="btn btn-default btn-flat float-right" href="<?php echo URL::to('/'); ?>/logout">Sign out</a>
              <form id="logout-form" action="" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="YCPrw4YQcAHSxcIwEqDvfUKwFb726vmppUKp1hl4">
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo URL::to('/'); ?>/admin/home" class="brand-link">
        <img src="{{asset('fronted/images/logo.png')}}" alt="AdminLTE Logo" class="img-circle new-brand-logo">
        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="<?php echo URL::to('/'); ?>/admin/home" class="nav-link" id="deshbord">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>

            </li>

            <li class="nav-item has-treeview" id="master_open">
              <!-- <a href="#" class="nav-link" id="master_menu">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Master Settings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a> -->
              <!-- <ul class="nav nav-treeview">
                <li id="category_menu" class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/manageCategory" class="nav-link" id="manage_category">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Category</p>
                  </a>
                </li>
              </ul> -->
              <ul class="nav nav-treeview">
                <!-- <li id="category_menu" class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/manage-location" class="nav-link" id="manage_location">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Location</p>
                  </a>
                </li> -->
              </ul>


              <!-- <ul class="nav nav-treeview">
                <li id="customer_menu" class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/customer_managment" class="nav-link" id="manage_customer">
                    <i class="far fa-user nav-icon"></i>
                    <p>Manage Customer</p>
                  </a>
                </li>
              </ul> -->
              <ul class="nav nav-treeview">

              </ul>
            </li>
            </li>

            <li class="nav-item has-treeview" id="categorymaster_open">
              <a href="#" class="nav-link" id="categorymaster_menu">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li id="setting_menu" class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/settings" class="nav-link" id="settings">
                    <i class="fas fa-cogs nav-icon"></i>
                    <p>Contact Settings</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item" id="court_menu">
                  <a href="<?php echo URL::to('/'); ?>/admin/court-managment" class="nav-link" id="court">
                    <i class="fas fa-users nav-icon"></i>
                    <p> Court Managment</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li id="category_menu" class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/manageCategory" class="nav-link" id="manage_category">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Category</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li id="admin_menu" class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/manageAdmin" class="nav-link" id="manage_admin">
                    <i class="fas fa-user-shield nav-icon"></i>
                    <p>Manage Admin</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/legal-issue" class="nav-link" id="legal_issue">
                    <i class="fas fa-balance-scale nav-icon"></i>
                    <p>Legal Issue</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/adviceCategory" class="nav-link" id="advice_cat">
                    <i class="fas fa-th nav-icon"></i>
                    <p>Lawyer Category</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo URL::to('/'); ?>/admin/query-category" class="nav-link" id="lawyer_cat">
                    <i class="fas fa-th nav-icon"></i>
                    <p>Legal Query Category</p>
                  </a>
                </li>
              </ul>

            </li>
            <li id="customer_menu" class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/customer_managment" class="nav-link" id="manage_customer">
                <i class="far fa-user nav-icon"></i>
                <p>Manage Customer</p>
              </a>
            </li>
            <li id="lawyer_menu" class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/manage-lawyer" class="nav-link" id="manage_lawyer">
                <!-- <i class="far fa-circle nav-icon"></i> -->
                <i class="fas fa-gavel nav-icon"></i>
                <p>Manage Lawyer</p>
              </a>
            </li>
            <!-- <li class="nav-item" >
              <a href="<?php echo URL::to('/'); ?>/admin/Blog" class="nav-link " id="manage_blog">
                <i class="fas fa-th nav-icon"></i>
                <p> Blog</p>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/webinar" class="nav-link" id="webinar">
                <i class="fas fa-th nav-icon"></i>
                <p>Webinar</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/trends" class="nav-link" id="trends">
                <i class="fas fa-poll nav-icon"></i>
                <p>Trends</p>
              </a>
            </li> -->



            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/adviceQuerys" class="nav-link" id="advice_query">
                <!-- <i class="far fa-circle nav-icon"></i> -->
                <i class="fas fa-question nav-icon"></i>
                <p>Legal Querys</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/guides-articles" class="nav-link" id="guide_article">
                <i class="fas fa-newspaper nav-icon"></i>
                <p>Guides & Articles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/other-resoureces" class="nav-link" id="other_resources">
                <!-- <i class="far fa-circle nav-icon"></i> -->
                <i class="fas fa-question nav-icon"></i>
                <p>Other Resources</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/legal-services" class="nav-link" id="legal_service">
                <!-- <i class="far fa-circle nav-icon"></i> -->
                <i class="fas fa-balance-scale nav-icon"></i>
                <p>Legal Services</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/legal-enquiry" class="nav-link" id="legalenquiry">
                <i class="fas fa-users nav-icon"></i>
                <p>Legal Enquiry</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/free-questions" class="nav-link" id="freequestions">
                <i class="fas fa-question nav-icon"></i>
                <p>Free Questions</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/review-rating" class="nav-link" id="reviewrating">
                <i class="fas fa-star nav-icon"></i>
                <p>Review Rating</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/ContactEnquiry" class="nav-link" id="contactenquiry">
                <i class="fas fa-users nav-icon"></i>
                <p>Contact Enquiry</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/enquiry" class="nav-link" id="enquiry">
                <i class="fas fa-users nav-icon"></i>
                <p> Enquiry</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?php echo URL::to('/'); ?>/admin/court-managment" class="nav-link" id="court">
                <i class="fas fa-users nav-icon"></i>
                <p> Court Managment</p>
              </a>
            </li> -->
          </ul>
          </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->