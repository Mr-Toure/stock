<div class="navbar-custom topnav-navbar topnav-navbar-scolar sticky">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="/" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="{{ asset('img/justice.png') }}" alt="" width="10%"  height="">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('favicon.jpg') }}" alt="" height="16">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">

            {{--  <li class="dropdown notification-list d-xl-none">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Rechercher ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li> --}}

            {{-- <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="javascript: void(0);" class="text-dark">
                                    <small>Effacer tout</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div style="max-height: 230px;" data-simplebar>
                        <!-- item-->
                        {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">developpent du Logiciel de gestion des aides scolaire
                                <small class="text-muted">il y a 1 min</small>
                            </p>
                        </a>
                    </div> --}}

                    <!-- All-->
                    {{-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        Voir tout
                    </a>

                </div>
            </li> --}}

            {{--<li class="dropdown notification-list d-none d-sm-inline-block">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-view-apps noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                    <div class="p-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/slack.png" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/github.png" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                    <span>G Suite</span>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </li> --}}

            <li class="notification-list">
                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                    <i class="dripicons-gear noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ asset('img/user.jpg') }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                        <span class="account-position">User</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0 text-danger">Content de vous revoir !!!</h6>
                    </div>

                    <!-- item-->
                    <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>Mon Compte</span>
                    </a>

                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit me-1"></i>
                        <span>Parametre</span>
                    </a>

                {{--  <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lifebuoy me-1"></i>
                        <span>Support</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lock-outline me-1"></i>
                        <span>Lock Screen</span>
                    </a>--}}

                    <!-- item-->
                    <div class="dropdown-item notify-item">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="mdi mdi-logout me-1"></i>{{ __('Deconnexion') }}
                            </a>
                        </form>
                    </div>

                </div>
            </li>

        </ul>

        <a class="button-menu-mobile text-black disable-btn">
            <div class="lines">
                <span class="bg-danger"></span>
                <span class="bg-danger"></span>
                <span class="bg-danger"></span>
            </div>
        </a>

    </div>
</div>
