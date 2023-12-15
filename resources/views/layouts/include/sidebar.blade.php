<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link active" href="{{ route('home') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                @can('isAdmin')
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
                            <li class="sidebar-item"><a href="{{ route('log.index') }}" class="sidebar-link"><span
                                        class="hide-menu">User
                                        Logs</span></a></li>
                        </ul>
                    </li>
                @endcan


                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Features</span>
                </li>
                @if (auth()->user()->role->value == 'ADMIN' || auth()->user()->role->value == 'OPT')
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
                            <li class="sidebar-item"><a href="{{ route('admin.ratioCriteria') }}"
                                    class="sidebar-link"><span class="hide-menu"> Hasil AHP
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-plus" class="feather-icon"></i><span
                            class="hide-menu">Calon KPM PKH</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('admin.pkh') }}" class="sidebar-link"><span
                                    class="hide-menu"> Data KPM PKH
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('admin.pkh.result') }}" class="sidebar-link"><span
                                    class="hide-menu"> Cetak Hasil
                                </span></a>
                        </li>
                        {{-- <li class="sidebar-item"><a href="{{ route('admin.pkh.hello') }}" class="sidebar-link"><span
                                    class="hide-menu"> hello
                                </span></a>
                        </li> --}}
                    </ul>
                </li>

                @if (auth()->user()->role->value == 'ADMIN' || auth()->user()->role->value == 'OPT')
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="archive" class="feather-icon"></i><span
                                class="hide-menu">
                                Metode ARAS</span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('dataCriteria') }}" class="sidebar-link"><span
                                        class="hide-menu"> Penilaian
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
