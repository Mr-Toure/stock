<div class="navbar-custom topnav-navbar topnav-navbar-scolar sticky">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="/" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="{{ asset('img/logoPort-bouetSoleil.png') }}" alt="" width="150px"  height="">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('favicon.jpg') }}" alt="" height="16">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">

            <li class="dropdown notification-list d-xl-none">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Rechercher ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="dropdown notification-list">
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
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Fonctionalité Bientôt Disponible
                                <small class="text-muted">il y a 1 min</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        Bientôt
                    </a>

                </div>
            </li>

            <li class="notification-list">
                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                    <i class="dripicons-gear noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ asset('img/mairie.jpg') }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                        <span class="account-position">
                        @php
                            if (strpos(Auth::user()->email, 'stock') !== false) {
                                echo "Gestion Informatique";
                            } 
                            if (strpos(Auth::user()->email, 'fourniture') !== false) {
                                echo "Gestion Fourniture Bureau";
                            } 
                        @endphp
                        </span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    
                    <!-- item-->
                    <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>Mon Compte</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('users.index')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit me-1"></i>
                        <span>Gestion des profiles</span>
                    </a>

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
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="app-search dropdown">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher..." id="top-search">
                    <span class="mdi mdi-magnify search-icon"></span>
                    <button class="input-group-text btn-primary" type="submit">Rechercher</button>
                </div>
            </form>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h5 class="text-overflow mb-2"><span class="text-danger">Bientôt</span> disponible</h5>
                </div>
            </div>
        </div>
    </div>
</div>
