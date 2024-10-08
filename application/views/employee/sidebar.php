<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo">
              <img
                src="<?php echo base_url()?>assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a href="<?php echo base_url('employee/dashboard'); ?>">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('employee/profile'); ?>">
                  <i class="fas fas fa-user"></i>
                  <p>My Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('employee/leave_history'); ?>">
                  <i class="fas fa-calendar-alt"></i>
                  <p>Leave</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('employee/salary'); ?>">
                  <i class="fas fa-money-bill-alt"></i>
                  <p>Salary History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('employee/task_list'); ?>">
                  <i class="far fa-chart-bar"></i>
                  <p>Task List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('employee/change_password'); ?>">
                  <i class="fas fa-key"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="#">
                  <i class="fas fa-calendar-alt"></i>
                  <p>Leave Request</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="#widgets">
                  <i class="fas fa-desktop"></i>
                  <p>Widgets</p>
                  <span class="badge badge-success">4</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Menu Levels</p>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="../index.html" class="logo">
                <img
                  src="<?php echo base_url()?>assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-bell"></i>
                    <span class="notification"><?php echo $count_salary; ?></span>
                  </a>
                  <ul
                    class="dropdown-menu notif-box animated fadeIn"
                    aria-labelledby="notifDropdown"
                  >
                    <li>
                      <div class="dropdown-title">
                        You have <?php echo $count_salary; ?> new notification
                      </div>
                    </li>
                    <li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="<?php echo base_url('employee/salary'); ?>">
                            <div class="notif-icon notif-primary">
                              <i class="fa fa-user-plus"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> New Salary Updated </span>
                              <span class="time">5 minutes ago</span>
                            </div>
                          </a>
                          
                        </div>
                      </div>
                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);"
                        >See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <i class="fas fa-layer-group"></i>
                  </a>
                  
                </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <?php if (!empty($employee_details['photo']) && file_exists('assets/images/'.$employee_details['photo'])) : ?>
                          <img src="<?php echo base_url('assets/images/'.$employee_details['photo']); ?>" alt="Profile Image" class="avatar-img rounded-circle">
                      <?php else : ?>
                          <img src="<?php echo base_url()?>assets/img/default-avatar.jpg" alt="Profile Image" class="avatar-img rounded-circle">
                      <?php endif; ?>

                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"><?php echo $employee_details['first_name'] . ' ' . $employee_details['last_name']; ?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                              <?php if (!empty($employee_details['photo']) && file_exists('assets/images/'.$employee_details['photo'])) : ?>
                                  <img src="<?php echo base_url('assets/images/'.$employee_details['photo']); ?>" alt="Profile Image" class="avatar-img rounded">
                              <?php else : ?>
                                  <img src="<?php echo base_url()?>assets/img/default-avatar.jpg" alt="Profile Image" class="avatar-img rounded">
                              <?php endif; ?>
                          </div>
                          <div class="u-text">
                            <h4><?php echo $employee_details['first_name']; ?></h4>
                            <p class="text-muted"><?php echo $employee_details['email']; ?></p>
                            <a
                              href="<?php echo base_url('employee/profile'); ?>"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout-link" href="<?php echo base_url('employee/logout'); ?>">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>