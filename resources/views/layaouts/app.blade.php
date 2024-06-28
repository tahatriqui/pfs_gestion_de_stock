<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/jfif" href="{{asset('assets/img/favicon.jfif')}}">
    <title>
        @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons ../assets/css/nucleo-icons.css -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset("assets/css/nucleo-svg.css")}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset("assets/css/material-dashboard.css?v=3.0.0")}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">


          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('materiel.index') }}">
                <img src="{{asset('assets/img/favicon.jfif')}}" alt="">
                <span class="ms-1 font-weight-bold text-white">CCM_STOCK</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class=" @yield("div") nav-link text-white " href=" {{ route('divisions.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_module</i>
                        </div>
                        <span class="nav-link-text ms-1">Les divisions</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="@yield("ser") nav-link text-white " href=" {{ route('services.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">info</i>
                        </div>
                        <span class="nav-link-text ms-1">Les services</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white @yield("util")" href="{{ route('show.user') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Les utilisateurs</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class=" @yield("etat") nav-link text-white " href=" {{ route('etat.index') }}">
                        <div class="text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">check_circle</i>
                        </div>
                        <span class="nav-link-text ms-1">Les etats</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="@yield("cat") nav-link text-white" href="{{ route('categorie.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">category</i>
                        </div>
                        <span class="nav-link-text ms-1">Les categories</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class=" @yield('mat') nav-link text-white " href="{{ route('materiel.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">widgets</i>
                        </div>
                        <span class="nav-link-text ms-1">Les materiels</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="@yield("mar") nav-link text-white " href="{{ route('marque.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">label</i>
                        </div>
                        <span class="nav-link-text ms-1">Les marques</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="@yield("aff") nav-link text-white " href="{{ route('affectation.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons">list_alt</i>
                        </div>
                        <span class="nav-link-text ms-1">Les affectiations</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
    {{-- content --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
    @yield('content')
        </div>
        </main>

  <!--   Core JS Files   -->
  <script src="{{asset("assets/js/core/popper.min.js")}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
              damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>

  <script>
        // Set a timer to close the alert after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            var alert = document.getElementById('autoCloseAlert');
            if (alert) {
                alert.classList.add('fade-out');
                setTimeout(function() {
                    var bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 1000); // Match this timeout to the CSS transition duration
            }
        }, 3000);
    </script>
</body>

</html>
