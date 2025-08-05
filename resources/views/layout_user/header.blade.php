    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title> @yield('title') | BPHTB </title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://bapenda.batam.go.id/favicon.ico" />

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link href="{{ asset('assets/vendor/icon-set/style.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}">

        <!-- CSS Front Template -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

        <!-- CSS Datatables -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/media/css/jquery.dataTables.min.css') }}">
    </head>

    <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">

        <script src="{{ asset('assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js') }}"></script>

        <!-- ========== HEADER ========== -->
        <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
            <div class="navbar-nav-wrap">
                <div class="navbar-brand-wrapper">
                    <!-- Logo -->
                    <a class="navbar-brand" href="./index.html" aria-label="Front">
                        <img class="navbar-brand-logo" src="{{ asset('assets/img/bapenda.png') }}" alt="Logo">
                        <img class="navbar-brand-logo-mini" src="{{ asset('assets/img/logo.jpg') }}" alt="Logo">
                    </a>
                    <!-- End Logo -->
                </div>

                <div class="navbar-nav-wrap-content-left">
                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                        <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip" data-placement="right" title="Collapse"></i>
                        <i class="tio-last-page navbar-vertical-aside-toggle-full-align" data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-toggle="tooltip" data-placement="right" title="Expand"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->

                </div>

                <!-- Secondary Content -->
                <div class="navbar-nav-wrap-content-right">
                    <!-- Navbar -->
                    <ul class="navbar-nav align-items-center flex-row">
                        <li class="nav-item d-md-none">
                            <!-- Search Trigger -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
                                    data-hs-unfold-options='{
                       "target": "#searchDropdown",
                       "type": "css-animation",
                       "animationIn": "fadeIn",
                       "hasOverlay": "rgba(46, 52, 81, 0.1)",
                       "closeBreakpoint": "md"
                     }'>
                                    <i class="tio-search"></i>
                                </a>
                            </div>
                            <!-- End Search Trigger -->
                        </li>

                        <li class="nav-item d-none d-sm-inline-block">
                            <!-- Notification -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
                                    data-hs-unfold-options='{
                       "target": "#notificationDropdown",
                       "type": "css-animation"
                     }'>
                                    <i class="tio-notifications-on-outlined"></i>
                                    <span class="btn-status btn-sm-status btn-status-danger"></span>
                                </a>

                                <div id="notificationDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu" style="width: 25rem;">
                                    <!-- Header -->
                                    <div class="card-header">
                                        <span class="card-title h4">Notifications</span>
                                    </div>
                                    <!-- End Header -->

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="notificationNavOne-tab" data-toggle="tab" href="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Messages (3)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="notificationNavTwo-tab" data-toggle="tab" href="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Archived</a>
                                        </li>
                                    </ul>
                                    <!-- End Nav -->

                                    <!-- Body -->
                                    <div class="card-body-height">
                                        <!-- Tab Content -->
                                        <div class="tab-content" id="notificationTabContent">
                                            <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                                                <ul class="list-group list-group-flush navbar-card-list-group">

                                                    <!-- Item -->
                                                    <li class="list-group-item custom-checkbox-list-wrapper">
                                                        <div class="row">
                                                            <div class="col-auto position-static">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="custom-control custom-checkbox custom-checkbox-list">
                                                                        <input type="checkbox" class="custom-control-input" id="notificationCheck2" checked>
                                                                        <label class="custom-control-label" for="notificationCheck2"></label>
                                                                        <span class="custom-checkbox-list-stretched-bg"></span>
                                                                    </div>
                                                                    <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                                                        <span class="avatar-initials">K</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col ml-n3">
                                                                <span class="card-title h5">Klara Hampton</span>
                                                                <p class="card-text font-size-sm">mentioned you in a comment</p>
                                                                <blockquote class="blockquote blockquote-sm">
                                                                    Nice work, love! You really nailed it. Keep it up!
                                                                </blockquote>
                                                            </div>
                                                            <small class="col-auto text-muted text-cap">10hr</small>
                                                        </div>
                                                        <a class="stretched-link" href="#"></a>
                                                    </li>
                                                    <!-- End Item -->
                                                </ul>
                                            </div>

                                            <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">
                                                <ul class="list-group list-group-flush navbar-card-list-group">
                                                    <!-- Item -->
                                                    <li class="list-group-item custom-checkbox-list-wrapper">
                                                        <div class="row">
                                                            <div class="col-auto position-static">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="custom-control custom-checkbox custom-checkbox-list">
                                                                        <input type="checkbox" class="custom-control-input" id="notificationCheck9">
                                                                        <label class="custom-control-label" for="notificationCheck9"></label>
                                                                        <span class="custom-checkbox-list-stretched-bg"></span>
                                                                    </div>
                                                                    <div class="avatar avatar-sm avatar-circle">
                                                                        <img class="avatar-img" src="{{ asset('assets/img/160x160/img8.jpg') }}" alt="Image Description">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col ml-n3">
                                                                <span class="card-title h5">Linda Bates</span>
                                                                <p class="card-text font-size-sm">Accepted your connection</p>
                                                            </div>
                                                            <small class="col-auto text-muted text-cap">17dy</small>
                                                        </div>
                                                        <a class="stretched-link" href="#"></a>
                                                    </li>
                                                    <!-- End Item -->

                                                    <!-- Item -->
                                                    <li class="list-group-item custom-checkbox-list-wrapper">
                                                        <div class="row">
                                                            <div class="col-auto position-static">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="custom-control custom-checkbox custom-checkbox-list">
                                                                        <input type="checkbox" class="custom-control-input" id="notificationCheck10">
                                                                        <label class="custom-control-label" for="notificationCheck10"></label>
                                                                        <span class="custom-checkbox-list-stretched-bg"></span>
                                                                    </div>
                                                                    <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                                                        <span class="avatar-initials">L</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col ml-n3">
                                                                <span class="card-title h5">Lewis Clarke</span>
                                                                <p class="card-text font-size-sm">completed <i class="tio-folder-bookmarked text-primary"></i> FD-134 task</p>
                                                            </div>
                                                            <small class="col-auto text-muted text-cap">2mn</small>
                                                        </div>
                                                        <a class="stretched-link" href="#"></a>
                                                    </li>
                                                    <!-- End Item -->
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Tab Content -->
                                    </div>
                                    <!-- End Body -->

                                    <!-- Card Footer -->
                                    <a class="card-footer text-center" href="#">
                                        View all notifications
                                        <i class="tio-chevron-right"></i>
                                    </a>
                                    <!-- End Card Footer -->
                                </div>
                            </div>
                            <!-- End Notification -->
                        </li>


                        <li class="nav-item">
                            <!-- Account -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                                    data-hs-unfold-options='{
                       "target": "#accountNavbarDropdown",
                       "type": "css-animation"
                     }'>
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="{{ asset('assets/img/160x160/img6.jpg') }}" alt="Image Description">
                                        <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                    </div>
                                </a>

                                <div id="accountNavbarDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account" style="width: 16rem;">
                                    <div class="dropdown-item-text">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-sm avatar-circle mr-2">
                                                <img class="avatar-img" src="{{ asset('assets/img/160x160/img6.jpg') }}" alt="Image Description">
                                            </div>
                                            <div class="media-body">
                                                <span class="card-title h5">Mark Williams</span>
                                                <span class="card-text">mark@example.com</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="#">
                                        <span class="text-truncate pr-2" title="Settings">Settings</span>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout')}}">
                                        <span class="text-truncate pr-2" title="Sign out">Sign out</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End Account -->
                        </li>
                    </ul>
                    <!-- End Navbar -->
                </div>
                <!-- End Secondary Content -->
            </div>
        </header>
        <!-- ========== END HEADER ========== -->