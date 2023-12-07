@extends('layouts.pkmpkh')
@section('title', 'Dashboard')

@section('content')

    <div class="page-breadcrumb">

        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ Auth::user()->name }}!
                </h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="row">
            {{-- <div class="col-sm-6 col-lg-3">
                <div class="card border-end">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">236</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Data User
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-sm-6 col-lg-3">
                <div class="card border-end ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $count }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Data PKH
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $count }}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Data Kriteria</h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                            href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-body py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                        CSS bloat and poor page performance. Custom CSS classes are used to create
                        custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the
                        Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>



        </div> --}}

            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Data PKM PKH</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" a>$40,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Data Kriteria</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Data Sub Kriteria</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" a>$40,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <!-- Tasks Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="row">

                <div class="col-lg-6">

                    <!-- Default Card Example -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary"> POGRAM KELUARGA HARAPAN</h6>

                        </div>
                        <div class="card-body">
                            Program Keluarga Harapan yang selanjutnya disebut PKH adalah program pemberian bantuan sosial
                            bersyarat kepada Keluarga Miskin (KM) yang ditetapkan sebagai keluarga penerima manfaat PKH.
                        </div>
                    </div>

                    <!-- Basic Card Example -->
                    {{-- <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                        </div>
                        <div class="card-body">


                        </div>
                    </div> --}}

                </div>

                <div class="col-lg-6">

                    <!-- Dropdown Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">SISTEM PENDUKUNG KEPUTUSAN</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            Sistem Pendukung Keputusan Sistem pendukung keputusan adalah sistem berbasis komputer yang mampu
                            memecahkan masalah manajemen dalam menghasilkan alternatif terbaik untuk mendukung keputusan
                            yang diambil oleh pengambil keputusan.
                        </div>
                    </div>
                </div>
            </div>

            <!-- *************************************************************** -->
            <!-- End First Cards -->
            <!-- *************************************************************** -->
            <!-- *************************************************************** -->

        </div>

    @endsection
