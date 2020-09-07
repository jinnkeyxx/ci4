 <div id="wrapper">
     <div class="navbar-custom">
         <ul class="list-unstyled topnav-menu float-right mb-0">

             <li class="dropdown notification-list dropdown d-none d-lg-inline-block ml-2">
                 <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
                     role="button" aria-haspopup="false" aria-expanded="false">
                     <img src="<?= base_url(); ?>\assets\images\flags\us.jpg" alt="lang-image" height="12">
                 </a>
                 <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <img src="<?= base_url(); ?>\assets\images\flags\germany.jpg" alt="lang-image" class="mr-1"
                             height="12"> <span class="align-middle">German</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <img src="<?= base_url(); ?>\assets\images\flags\italy.jpg" alt="lang-image" class="mr-1"
                             height="12"> <span class="align-middle">Italian</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <img src="<?= base_url(); ?>\assets\images\flags\spain.jpg" alt="lang-image" class="mr-1"
                             height="12"> <span class="align-middle">Spanish</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <img src="<?= base_url(); ?>\assets\images\flags\russia.jpg" alt="lang-image" class="mr-1"
                             height="12"> <span class="align-middle">Russian</span>
                     </a>

                 </div>
             </li>





             <li class="dropdown notification-list">
                 <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                     href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <img src="<?= base_url(); ?>\assets\images\users\avatar-1.jpg" alt="user-image"
                         class="rounded-circle">
                     <span
                         class="d-none d-sm-inline-block ml-1 font-weight-medium"><?= $user['firstname'] . " " .$user['lastname']; ?></span>
                     <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right profile-dropdown" x-placement="bottom-end"
                     style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(129px, 70px, 0px);">
                     <!-- item-->
                     <div class="dropdown-header noti-title">
                         <h6 class="text-overflow text-white m-0">Welcome !</h6>
                     </div>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <i class="mdi mdi-account-outline"></i>
                         <span>Profile</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <i class="mdi mdi-settings-outline"></i>
                         <span>Settings</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <i class="mdi mdi-lock-outline"></i>
                         <span>Lock Screen</span>
                     </a>

                     <div class="dropdown-divider"></div>

                     <!-- item-->
                     <a href="logout" class="dropdown-item notify-item">
                         <i class="mdi mdi-logout-variant"></i>
                         <span>Logout</span>
                     </a>

                 </div>
             </li>



         </ul>

         <!-- LOGO -->
         <div class="logo-box">
             <a href="index.html" class="logo text-center logo-dark">
                 <span class="logo-lg">
                     <img src="<?= base_url(); ?>\assets\images\logo.png" alt="" height="22">

                 </span>
                 <span class="logo-sm">

                     <img src="<?= base_url(); ?>\assets\images\logo-sm.png" alt="" height="24">
                 </span>
             </a>

             <a href="index.html" class="logo text-center logo-light">
                 <span class="logo-lg">
                     <img src="<?= base_url(); ?>\assets\images\logo-light.png" alt="" height="22">

                 </span>
                 <span class="logo-sm">

                     <img src="<?= base_url(); ?>\assets\images\logo-sm-light.png" alt="" height="24">
                 </span>
             </a>
         </div>

         <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
             <li>
                 <button class="button-menu-mobile waves-effect waves-light">
                     <i class="mdi mdi-menu"></i>
                 </button>
             </li>

             <li class="d-none d-sm-block">
                 <form class="app-search">
                     <div class="app-search-box">
                         <div class="input-group">
                             <input type="text" class="form-control" placeholder="Search...">
                             <div class="input-group-append">
                                 <button class="btn" type="submit">
                                     <i class="fas fa-search"></i>
                                 </button>
                             </div>
                         </div>
                     </div>
                 </form>
             </li>
         </ul>
     </div>
     <div class="left-side-menu">
         <div class="slimscroll-menu">
             <div id="sidebar-menu">
                 <ul class="metismenu" id="side-menu">
                     <li class="menu-title">Navigation</li>
                     <li>
                         <a href="dashboard">
                             <i class="mdi mdi-view-dashboard"></i>
                             <span> Dashboard </span>
                         </a>
                     </li>
                     <li>
                         <a href="vietbai">
                             <i class="mdi mdi-view-dashboard"></i>
                             <span> Thêm bài mới </span>
                         </a>
                     </li>
                     <li>
                         <a href="user">
                             <i class="mdi mdi-calendar-month"></i>
                             <span> Quản lí người dùng </span>
                         </a>
                     </li>
                     <li>
                         <a href="post">
                             <i class=" mdi mdi-calendar-month"></i>
                             <span> Quản lí bải viết</span>
                         </a>
                     </li>
                 </ul>

             </div>
             <div class="clearfix"></div>
         </div>
     </div>
     <div id="wrapper">
         <div class="content-page">
             <div class="content">
                 <div class="container-fluid py-4">
                     <div class="row">
                         <div class="col-12">