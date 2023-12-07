<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link active" href="{{ route('admin.dashboard') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Management</span></li>
                <li class="sidebar-item">
                    <a href="javascript:void(0)" class="sidebar-link has-arrow" aria-expanded="false">
                        <i data-feather="shield" class="feather-icon"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('admin.user') }}" class="sidebar-link"><span
                                    class="hide-menu">User
                                    Management</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('admin.log') }}" class="sidebar-link"><span
                                    class="hide-menu">User
                                    Logs</span></a></li>
                    </ul>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Features</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon">
                        </i>
                        <span class="hide-menu">Metode AHP </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('admin.criteria') }}" class="sidebar-link"><span
                                    class="hide-menu"> Kriteria
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('admin.ratioCriteria') }}" class="sidebar-link"><span
                                    class="hide-menu"> Hasil AHP
                                </span></a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-plus" class="feather-icon"></i><span
                            class="hide-menu">Calon KPM PKH</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('admin.pkh') }}" class="sidebar-link"><span
                                    class="hide-menu"> Data KPM PKH
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="archive" class="feather-icon"></i><span
                            class="hide-menu">
                            Metode ARAS</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('admin.dataCriteria') }}" class="sidebar-link"><span
                                    class="hide-menu"> penilaian
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
