<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <div class="sidebar-brand">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('/images/pkhlogo.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <!-- Logo icon -->
                        {{-- <a href="index.html">
                            <img src="../assets/images/Group6.svg" alt="" class="img-fluid"> --}}
                        {{-- <img src="../assets/images/abstract-shape.png" alt="" class="img-fluid"> --}}
                        {{-- </a> --}}
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
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
                    <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <div class="customize-input">
                                    <form>
                                        <div class="customize-input">
                                            <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                                type="search" placeholder="Search" aria-label="Search">
                                            <i class="form-control-icon" data-feather="search"></i>
                                        </div>
                                    </form>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">


                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/no-image.png" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ms-2 d-none d-lg-inline-block"><span></span> <span
                                        class="text-dark">{{ Auth::user()->name }}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon me-2 ms-1"></i>
                                    My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                        data-feather="power" class="svg-icon me-2 ms-1"></i>
                                    Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link active"
                                href="{{ route('admin.dashboard') }}" aria-expanded="false"><i data-feather="home"
                                    class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                        {{-- <li class="list-divider"></li> --}}
                        {{-- <li class="nav-small-cap"><span class="hide-menu">User Management</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('admin.user') }}"
                                aria-expanded="false"><i data-feather="shield" class="feather-icon"></i><span
                                    class="hide-menu">Hak Akses
                                </span></a>
                        </li> --}}
                        <li class="list-divider"></li>
                        <li class="nav-small-cap">
                            <span class="hide-menu">Components</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i data-feather="file-text" class="feather-icon">
                                </i>
                                <span class="hide-menu">Metode AHP </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{ route('admin.criteria') }}"
                                        class="sidebar-link"><span class="hide-menu"> Kriteria
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{ route('admin.ratioCriteria') }}"
                                        class="sidebar-link"><span class="hide-menu"> Hasil AHP
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-plus" class="feather-icon"></i><span
                                    class="hide-menu">Calon KPM PKH</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{ route('admin.pkh') }}"
                                        class="sidebar-link"><span class="hide-menu"> Data KPM PKH
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="archive" class="feather-icon"></i><span
                                    class="hide-menu">
                                    Metode ARAS</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{ route('admin.dataCriteria') }}"
                                        class="sidebar-link"><span class="hide-menu"> penilaian
                                        </span></a>
                                </li>
                                {{-- <li class="sidebar-item"><a href="table-basic.html" class="sidebar-link"><span class="hide-menu">
                      Sub Kriteria
                    </span></a>
                </li>
                <li class="sidebar-item"><a href="table-basic.html" class="sidebar-link"><span class="hide-menu">
                      Penilaian
                    </span></a>
                </li> --}}
                            </ul>
                        </li>
                        {{-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html"
                aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span
                  class="hide-menu">Hasil SPK
                </span></a> --}}
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @yield('content')

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            {{-- <footer class="footer text-center text-muted">
                All Rights Reserved by SPK PKH. Designed and Developed by <a
                    href="https://adminmart.com/">Adminmart</a>.
            </footer> --}}
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>

    <script>
        //Delete All Javascript
        $(function(e) {

            $("#select_all_ids").click(function() {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });

            $('#deleteAllSelectedRecord').click(function(e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    all_ids.push($(this).val());
                });


                $.ajax({
                    url: "{{ route('admin.pkh.delete') }}",
                    type: "DELETE",
                    data: {
                        ids: all_ids,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $.each(all_ids, function(key, val) {
                            $('#ratio_ids' + val).remove();
                        })

                        setInterval('location.reload()', 2000);

                    }
                });
            });
        });
    </script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: "top-end",
                title: "{!! Session::get('message') !!}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{!! Session::get('success') !!}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "{!! Session::get('error') !!}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    // if with('pesan', 'Isi pesan')
    @if (session()->has('pesan'))
        <script>
            Swal.fire({
                position: "top-end",
                title: "{{ session('pesan') }}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
    @yield('js')
</body>

</html>
