      <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
        <div class="navbar-nav-wrap">
          <div class="navbar-brand-wrapper">
            <!-- Logo -->
            <a class="navbar-brand" href="" aria-label="ebphtb">
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
                                      <input type="checkbox" class="custom-control-input" id="notificationCheck1" checked>
                                      <label class="custom-control-label" for="notificationCheck1"></label>
                                      <span class="custom-checkbox-list-stretched-bg"></span>
                                    </div>
                                    <div class="avatar avatar-sm avatar-circle">
                                      <img class="avatar-img" src="./assets/img/160x160/img3.jpg" alt="Image Description">
                                    </div>
                                  </div>
                                </div>
                                <div class="col ml-n3">
                                  <span class="card-title h5">Brian Warner</span>
                                  <p class="card-text font-size-sm">changed an issue from "In Progress" to <span class="badge badge-success">Review</span></p>
                                </div>
                                <small class="col-auto text-muted text-cap">2hr</small>
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

                            <!-- Item -->
                            <li class="list-group-item custom-checkbox-list-wrapper">
                              <div class="row">
                                <div class="col-auto position-static">
                                  <div class="d-flex align-items-center">
                                    <div class="custom-control custom-checkbox custom-checkbox-list">
                                      <input type="checkbox" class="custom-control-input" id="notificationCheck4" checked>
                                      <label class="custom-control-label" for="notificationCheck4"></label>
                                      <span class="custom-checkbox-list-stretched-bg"></span>
                                    </div>
                                    <div class="avatar avatar-sm avatar-circle">
                                      <img class="avatar-img" src="./assets/img/160x160/img10.jpg" alt="Image Description">
                                    </div>
                                  </div>
                                </div>
                                <div class="col ml-n3">
                                  <span class="card-title h5">Ruby Walter</span>
                                  <p class="card-text font-size-sm">joined the Slack group HS Team</p>
                                </div>
                                <small class="col-auto text-muted text-cap">3dy</small>
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
                                      <input type="checkbox" class="custom-control-input" id="notificationCheck3">
                                      <label class="custom-control-label" for="notificationCheck3"></label>
                                      <span class="custom-checkbox-list-stretched-bg"></span>
                                    </div>
                                    <div class="avatar avatar-sm avatar-circle">
                                      <img class="avatar-img" src="./assets/svg/brands/google.svg" alt="Image Description">
                                    </div>
                                  </div>
                                </div>
                                <div class="col ml-n3">
                                  <span class="card-title h5">from Google</span>
                                  <p class="card-text font-size-sm">Start using forms to capture the information of prospects visiting your Google website</p>
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
                                      <input type="checkbox" class="custom-control-input" id="notificationCheck5">
                                      <label class="custom-control-label" for="notificationCheck5"></label>
                                      <span class="custom-checkbox-list-stretched-bg"></span>
                                    </div>
                                    <div class="avatar avatar-sm avatar-circle">
                                      <img class="avatar-img" src="./assets/img/160x160/img7.jpg" alt="Image Description">
                                    </div>
                                  </div>
                                </div>
                                <div class="col ml-n3">
                                  <span class="card-title h5">Sara Villar</span>
                                  <p class="card-text font-size-sm">completed <i class="tio-folder-bookmarked text-primary"></i> FD-7 task</p>
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
                          <span class="card-title h5">{{ auth()->user()->nama_lengkap }}</span>
                          <span class="card-text">mark@example.com</span>
                        </div>
                      </div>
                    </div>

                    <div class="dropdown-divider"></div>


                    <a class="dropdown-item" href="#">
                      <span class="text-truncate pr-2" title="Settings">Settings</span>
                    </a>

                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"> Logout </button>
                    </form>
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