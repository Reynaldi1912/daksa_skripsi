<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../cuba/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../cuba/assets/images/favicon.png" type="image/x-icon">
    <title>DAKSA</title>
    <!-- Google font-->
    <script src="../cuba/assets/js/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/font-awesome.css">
    <!-- ico-font-->======
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/todo.css">
    <!-- Plugins css Ends-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="../cuba/assets/js/chart/apex-chart/apex-chart.js"></script> -->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/style.css">
    <link id="color" rel="stylesheet" href="../cuba/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../cuba/assets/css/vendors/sweetalert2.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

  </head>
  <body> 
    
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="../cuba/assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          
          <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
              <li class="onhover-dropdown">
                <!-- <div class="notification-box">
                  <svg>
                    <use href="../cuba/assets/svg/icon-sprite.svg#notification"></use>
                  </svg><span class="badge rounded-pill badge-secondary">4 </span>
                </div> -->
                <!-- <div class="onhover-show-div notification-dropdown">
                  <h6 class="f-18 mb-0 dropdown-title">Notitications</h6>
                  <ul>
                    <li class="b-l-primary border-4">
                      <p>Delivery processing <span class="font-danger">10 min.</span></p>
                    </li>
                    <li class="b-l-success border-4">
                      <p>Order Complete<span class="font-success">1 hr</span></p>
                    </li>
                    <li class="b-l-secondary border-4">
                      <p>Tickets Generated<span class="font-secondary">3 hr</span></p>
                    </li>
                    <li class="b-l-warning border-4">
                      <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                    </li>
                    <li><a class="f-w-700" href="#">Check all</a></li>
                  </ul>
                </div> -->
              </li>
              <li class="profile-nav onhover-dropdown pe-0 py-0">
                <div class="media profile-media"><img class="b-r-10" src="../cuba/assets/images/dashboard/profile.png" alt="">
                  <div class="media-body"><span>{{ Auth::user()->name }}</span>
                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-in"></i><span>Log Out</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
          <div>
            <div class="logo-wrapper"><a href="#"><img class="img-fluid for-light" src="../cuba/assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="../cuba/assets/images/logo/logo_dark.png" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid" src="../cuba/assets/images/logo/logo-icon.png" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="#"><img class="img-fluid" src="../cuba/assets/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>UMUM</h6>
                    </div>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="/home">
                  <svg class="stroke-icon">
                        <use href="../cuba/assets/svg/icon-sprite.svg#stroke-home"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../cuba/assets/svg/icon-sprite.svg#fill-home"></use>
                      </svg><span class="lan-3">Dashboard</span></a></li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6 >Pengaturan</h6>
                    </div>
                  </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="/master-tempat">
                    <i data-feather="map"></i>&nbsp<span>Data Tempat</span></a>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="/master-ulasan">
                    <i data-feather="message-circle"></i>&nbsp<span>Ulasan</span></a>
                    </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            @yield('content')
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">2023 © Mochammad Dimasqi Aliffudin Faiz </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    @if(session('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3 toast-index toast-rtl">
      <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex justify-content-between bg-success p-2">
          <div class="toast-body">{{ session('success') }}</div>
        </div>
      </div>
    </div>
    @endif
    @if(session('error'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3 toast-index toast-rtl">
      <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex justify-content-between bg-danger p-2">
          <div class="toast-body">{{ session('error') }}</div>
        </div>
      </div>
    </div>
    @endif
    @if(session('warning'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3 toast-index toast-rtl">
      <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex justify-content-between bg-warning p-2">
          <div class="toast-body">{{ session('warning') }}</div>
        </div>
      </div>
    </div>
    @endif
    <!-- latest jquery-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toast = document.querySelector('.toast');
            setTimeout(function() {
                toast.classList.remove('show');
                toast.classList.add('hide');
            }, 5000);
        });
    </script>

    <!-- Bootstrap js-->
    <script src="../cuba/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../cuba/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../cuba/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../cuba/assets/js/scrollbar/simplebar.js"></script>
    <script src="../cuba/assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../cuba/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="../cuba/assets/js/sidebar-menu.js"></script>
    <!-- <script src="../cuba/assets/js/clock.js"></script> -->
    <script src="../cuba/assets/js/slick/slick.min.js"></script>
    <script src="../cuba/assets/js/slick/slick.js"></script>
    <script src="../cuba/assets/js/header-slick.js"></script>
    <script src="../cuba/assets/js/height-equal.js"></script>
    <!-- <script src="../cuba/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="../cuba/assets/js/chart/apex-chart/moment.min.js"></script> -->
    <script src="../cuba/assets/js/dashboard/default.js"></script>
    <script src="../cuba/assets/js/notify/index.js"></script>
    <script src="../cuba/assets/js/typeahead/handlebars.js"></script>
    <script src="../cuba/assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="../cuba/assets/js/typeahead/typeahead.custom.js"></script>
    <script src="../cuba/assets/js/typeahead-search/handlebars.js"></script>
    <script src="../cuba/assets/js/typeahead-search/typeahead-custom.js"></script>
    <script src="../cuba/assets/js/sweet-alert/sweetalert.min.js"></script>
    <script src="../cuba/assets/js/sweet-alert/app.js"></script>
    <script src="../cuba/assets/js/height-equal.js"></script>
    <script src="../cuba/assets/js/animation/wow/wow.min.js"></script>
    <script src="../cuba/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../cuba/assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="../cuba/assets/js/todo/todo.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../cuba/assets/js/script.js"></script>
    <!-- Plugin used-->
  </body>
</html>