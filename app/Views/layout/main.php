<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/assets/images/favicon.png') ?>">
    <title>Agbing Magbuhos Dental Clinic</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('public/dist/css/style.min.css')?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('public/assets/extra-libs/prism/prism.css')?>">
<![endif]-->
</head>

<body>
    <div class="lightbox">
        
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand  justify-content-center  pt-3">
                        <!-- Logo icon -->
                        <a href="index.html">
                        
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                
                                <img src="<?php echo base_url('public/assets/images/logo-text.png')?>" width="170"  alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="  <?php echo base_url('public/assets/images/logo-light-text.png')?>" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                                        the my new
                                                        admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                             
                                <img src="<?php echo base_url('public/assets/images/users/profile-pic.jpg')?>" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark"><?php echo $userData['first_name'] . ' ' .  $userData['last_name']?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('public/logout')?>"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item <?php if( $selected == 'dashboard' ){echo 'selected';} ?>"> <a class="sidebar-link sidebar-link" href="<?php echo base_url('public/Admin/dashboard')?>"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                        <li class="sidebar-item <?php if( $selected == 'patient' || $selected == 'add_patient' || $selected == 'patient_info' ){echo 'selected';} ?>"> <a class="sidebar-link" href="<?php echo base_url('public/Admin/patient')?>"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Patient
                                </span></a>
                        </li>
                        <li class="sidebar-item <?php if( $selected == 'transaction' ){echo 'selected';} ?>"> <a class="sidebar-link sidebar-link" href="<?php echo base_url('public/Admin/transaction')?>"
                                aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                                    class="hide-menu">Transactions</span></a></li>
                        <li class="sidebar-item <?php if( $selected == 'calendar' ){echo 'selected';} ?>"> <a class="sidebar-link sidebar-link" href="<?php echo base_url('public/Admin/calendar')?>"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Calendar</span></a></li>
                        <li class="sidebar-item <?php if( $selected == 'appointment' ){echo 'selected';} ?>"> <a class="sidebar-link sidebar-link" href="<?php echo base_url('public/Admin/appointment')?>"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Appointment</span></a></li>
                                    <li class="sidebar-item <?php if( $selected == 'patient_photos' ){echo 'selected';} ?>"> <a class="sidebar-link sidebar-link" href="<?php echo base_url('public/Admin/patient_photos')?>"
                                aria-expanded="false"><i data-feather="camera" class="feather-icon"></i><span
                                    class="hide-menu">Patient Photos</span></a></li>
                        <li class="list-divider"></li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>


    <?php $this->renderSection('content')  ?>  
          
    <footer class="footer text-center text-muted">
        All Rights Reserved. Designed and Developed by <a
            href="https://Lawrenzem.com">Lawrenzem</a>.
    </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php echo base_url('public')?>
    <script src="<?php echo base_url('public/assets/libs/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src=" <?php echo base_url('public/assets/libs/popper.js/dist/umd/popper.min.js')?>"></script>
    <script src="   <?php echo base_url('public/assets/libs/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="    <?php echo base_url('public/dist/js/app-style-switcher.js')?>"></script>
    <script src=" <?php echo base_url('public/dist/js/feather.min.js')?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="  <?php echo base_url('public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')?>"></script>
    <script src="  <?php echo base_url('public/assets/extra-libs/sparkline/sparkline.js')?>"></script>
    
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="  <?php echo base_url('public/dist/js/sidebarmenu.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="  <?php echo base_url('public/dist/js/custom.min.js')?>"></script>
    <!-- This Page JS -->
    <script src="  <?php echo base_url('public/assets/extra-libs/prism/prism.js')?>"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="sweetalert2.all.min.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <?php if( $selected == 'dashboard' ){?>
    <script src="  <?php echo base_url('public/dist/js/pages/dashboards/dashboard1.min.js')?>"></script>
    <script src="  <?php echo base_url('public/assets/extra-libs/c3/d3.min.js')?>"></script>
    <script src="  <?php echo base_url('public/assets/extra-libs/c3/c3.min.js')?>"></script>
    <script src="  <?php echo base_url('public/assets/libs/chartist/dist/chartist.min.js')?>"></script>
    <script src="  <?php echo base_url('public/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')?>"></script>
    <?php } ?>
    <?php if( $selected == 'patient' ){?>
    <script src="  <?php echo base_url('public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/pages/datatable/datatable-basic.init.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/admin/patient.js')?>"></script>
    <?php } ?> 
    <?php if( $selected == 'add_patient' ){?>  
    <script src="  <?php echo base_url('public/dist/js/admin/add_patient.js')?>"></script>
    <?php } ?> 
    <?php if( $selected == 'transaction' ){?>
    <script src="  <?php echo base_url('public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/pages/datatable/datatable-basic.init.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/admin/transaction.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/vfs_fonts.min.js"></script>
    <?php } ?> 
    <?php if( $selected == 'patient_info' ){?>  
    <script src="  <?php echo base_url('public/dist/js/admin/patient_info.js')?>"></script>
    <?php } ?> 
    <?php if( $selected == 'calendar' ){?>  
    <!-- <script src="  <?php //echo base_url('public/dist/js/admin/patient_info.js')?>"></script> -->
    <script src=" <?php echo base_url('public/assets/libs/moment/min/moment.min.js')?>"></script>
    <script src="<?php echo base_url('public/assets/libs/fullcalendar/dist/fullcalendar.min.js')?>"></script>
    <script src="<?php echo base_url('public/dist/js/pages/calendar/cal-init.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/admin/calendar.js')?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
     
    <?php } ?> 
    <?php if( $selected == 'appointment' ){?>  
        <script src="  <?php echo base_url('public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/pages/datatable/datatable-basic.init.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/admin/appointment.js')?>"></script>
    <script src=" <?php echo base_url('public/assets/libs/moment/min/moment.min.js')?>"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
    <?php } ?> 
    <?php if( $selected == 'patient_photos' ){?>
    <script src="  <?php echo base_url('public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/pages/datatable/datatable-basic.init.js')?>"></script>
    <script src="  <?php echo base_url('public/dist/js/admin/patient.js')?>"></script>
    <!-- <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>-->
    <script src="  <?php echo base_url('public/dist/js/admin/records.js')?>"></script> 
    <script src="  <?php echo base_url('public/dist/css/lightbox/main.js')?>"></script>     
    <?php } ?> 
</body>

</html>