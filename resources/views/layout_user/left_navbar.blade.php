<!-- Navbar Vertical -->
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
                        <a class="js-nav-tooltip-link nav-link " href="{{ route('dashboard') }}" title="Home" data-placement="left">
                            <i class="tio-home-vs-1-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Home </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{ request()->is('njop*') ? 'active' : '' }}" href="{{ route('cekNJOP') }}" title="Cek NJOP" data-placement="left">
                            <i class="tio-all-done nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Cek NJOP </span>
                        </a>
                    </li>
                    
                    {{-- Menu Kelola SSPD --}}
                    <li class="navbar-vertical-aside-has-menu {{ request()->is('sspd*') ? 'show' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle {{ request()->is('sspd*') ? 'active' : '' }}" href="javascript:;" title="Kelola SSPD">
                            <i class="tio-apps nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Kelola SSPD</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('sspd/create') ? 'active' : '' }}" href="{{ route('sspd.create') }}" title="Input SSPD">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Input SSPD</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#" title="Buat billing kurang bayar">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Buat Billing KB</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link {{ request()->is('transaction*') ? 'active' : '' }}" href="{{ route('transaction') }}" title="Manajemen Transaksi" data-placement="left">
                            <i class="tio-folders-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Manajemen Transaksi </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link " href="#" title="Monitoring KB" data-placement="left">
                            <i class="tio-visible-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Monitoring KB </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link " href="#" title="Laporan Transaksi" data-placement="left">
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
<!-- End Navbar Vertical -->
