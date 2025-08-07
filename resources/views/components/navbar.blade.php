    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">
                <div class="navbar-brand-wrapper justify-content-between" style="height: 75px;">
                    <!-- Logo -->
                    <a class="navbar-brand" href="" aria-label="Front">
                        <img class="navbar-brand-logo" src="{{ asset('assets/img/bapenda.png') }}" alt="Logo">
                        <img class="navbar-brand-logo-mini" src="{{ asset('assets/img/logo.jpg') }}" alt="Logo">
                    </a>
                    <!-- End Logo -->

                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/') }}/dashboard" title="Welcome page" data-placement="left">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Home </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ request()->is('njop') ? 'active' : '' }}" href="{{ route('cekNJOP') }}" title="cek NJOP" data-placement="left">
                                <i class="tio-all-done nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Cek NJOP </span>
                            </a>
                        </li>

                        <li class="navbar-vertical-aside-has-menu {{ (request()->is('sspd') || request()->is('sspd/create') ? 'show' : '') }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ (request()->is('sspd') || request()->is('sspd/create') ? 'active' : '') }}" href="javascript:;" title="Kelola SSPD">
                                <i class="tio-apps nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Kelola SSPD </span>
                            </a>

                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                    <li class="nav-item">
                                    <a class="nav-link {{ request()->is('sspd') ? 'active' : '' }}" href="{{ route('sspd.index') }}" title="Data Transaksi SSPD">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Data SSPD {{ request()->is('sspd.index') ? 'active' : '' }}</span>
                                    </a>
                                    </li>

                                    <li class="nav-item">
                                    <a class="nav-link {{ request()->is('sspd/create') ? 'active' : '' }}" href="{{ route('sspd.create') }}" title="Input SSPD">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Input SSPD</span>
                                    </a>
                                    </li>

                                    <!-- <li class="nav-item">
                                    <a class="nav-link " href="" title="Buat billing kurang bayar">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Buat Billing KB</span>
                                    </a>
                                    </li> -->
                                </ul>
                        </li>
                        {{-- MENU BARU: VERIFIKASI --}}
                        <li class="navbar-vertical-aside-has-menu {{ request()->is('verifikasi*') ? 'show' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ request()->is(patterns: 'verifikasi*') ? 'active' : '' }}" href="javascript:;" title="Verifikasi">
                                <i class="tio-checkmark-circle-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Verifikasi</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('verifikasi/transaksi*') ? 'active' : '' }}" href="{{ route('verifikasi.transaksi') }}" title="Verifikasi Transaksi">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Verifikasi Transaksi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('verifikasi/kurang-bayar*') ? 'active' : '' }}" href="{{ route('verifikasi.kurangBayar') }}" title="Verifikasi Kurang Bayar">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Verifikasi Kurang Bayar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ request()->is('monitoring/transaksi') ? 'active' : '' }}" href="{{ url('monitoring/transaksi') }}" title="Monitoring Transaksi" data-placement="left">
                                <i class="tio-devices-2 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Monitoring Transaksi </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ request()->is('monitoring/kb') ? 'active' : '' }}" href="{{ url('monitoring/kb') }}" title="Monitoring Kurang Bayar" data-placement="left">
                                <i class="tio-devices-2 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Monitoring Kurang bayar </span>
                            </a>
                        </li> -->
                        <!-- Monitoring -->
                        <li class="navbar-vertical-aside-has-menu {{ (request()->is('monitoring/transaksi') || request()->is('monitoring/kb') ? 'show' : '') }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ (request()->is('monitoring/transaksi') || request()->is('monitoring/kb') ? 'active' : '') }}" href="javascript:;" title="Monitoring">
                            <i class="tio-devices-2 nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Monitoring 
                        </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="js-nav-tooltip-link nav-link {{ request()->is('monitoring/transaksi') ? 'active' : '' }}" href="{{ url('monitoring/transaksi') }}" title="Monitoring Transaksi" data-placement="left">
                                        <!-- <i class="tio-devices-2 nav-icon"></i>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Monitoring Transaksi </span> -->
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Transaksi </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="js-nav-tooltip-link nav-link {{ request()->is('monitoring/kb') ? 'active' : '' }}" href="{{ url('monitoring/kb') }}" title="Monitoring Kurang Bayar" data-placement="left">
                                        <!-- <i class="tio-devices-2 nav-icon"></i>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Monitoring Kurang bayar </span> -->
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Kurang Bayar </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- End Monitoring -->

                        <!-- <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link {{ request()->is('transaction') ? 'active' : '' }}" href="{{ route('transaction') }}" title="Welcome page" data-placement="left">
                                <i class="tio-folders-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Manajemen Transaksi </span>
                            </a>
                        </li> -->

                        <li class="nav-item ">
                            <a class="js-nav-tooltip-link nav-link " href="./welcome-page.html" title="Welcome page" data-placement="left">
                                <i class="tio-chat-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Laporan Transaksi </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                    </ul>
                </div>
                <!-- End Content -->

                <!-- Footer -->
                <div class="navbar-vertical-footer">
                    &nbsp;
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </aside>    