<div class="leftside-menu leftside-menu-detached">

    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="{{ asset('img/user.jpg') }}" alt="user-image" height="80" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name">Toure Simplice</span>
        </a>
    </div>

    <!--- Sidemenu -->
    <ul class="side-nav">

        <li class="side-nav-title side-nav-item">Accueil et Statistique</li>

        <li class="side-nav-item">
            <a href="{{ route('dashboard') }}" aria-expanded="true" aria-controls="sidebarDashboards" class="side-nav-link">
                <i class="uil-home-alt"></i>
                {{-- <span class="badge bg-info rounded-pill float-end">4</span> --}}
                <span> Tableau de Bord </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Stockage</li>

        <li class="side-nav-item">
            <a href="{{  route('fournitures.index')  }}" class="side-nav-link">
                <i class="mdi mdi-store"></i>
                <span> Fournitures</span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Application</li>

        <li class="side-nav-item">
            <a href="{{ route('besoin.index') }}" class="side-nav-link">
                <i class="mdi mdi-hand-wash-outline"></i>
                @if(isset($besoins))
                    @if($besoins->whereIn('status',105)->count())
                        <span class="badge bg-danger rounded-pill float-end"><b>{{ $besoins->whereIn('status',105)->count() }}</b></span>
                    @endif
                @endif
                <span> Besoins </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{ route('commandes.index') }}" class="side-nav-link">
                <i class="mdi mdi-cart"></i>
                <span> Commandes </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{ route('bonlivraisons.index') }}" class="side-nav-link">
                <i class="mdi mdi-cash-register"></i>
                <span> Livraison </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Validation</li>

        <li class="side-nav-item">
            <a href="{{ route('besoins.approbation') }}" class="side-nav-link">
                <i class="mdi mdi-check"></i>
                <span> Approbation </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Parametre</li>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarPersonnel" aria-expanded="false" aria-controls="sidebarPersonnel" class="side-nav-link">
                <i class="uil-store"></i>
                <span> Personnel </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarPersonnel">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route("directions.index") }}"><i class="uil-store me-1"></i>Direction</a>
                    </li>
                    <li>
                        <a href="{{ route('ssdirections.index') }}"><i class="uil-store me-1"></i>Services</a>
                    </li>
                   {{--  <li>
                        <a href="{{ route('services.index') }}"><i class="uil-store me-1"></i>Services</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('agents.index') }}"><i class="uil-store me-1"></i>Agent</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarArticle" aria-expanded="false" aria-controls="sidebarArticle" class="side-nav-link">
                <i class="mdi mdi-mouse"></i>
                <span> Informatique </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarArticle">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('fournitures.encres') }}"><i class="mdi mdi-printer-settings me-1"></i>Encres</a>
                    </li>
                    <li>
                        <a href="{{ route('printers.index') }}"><i class="mdi mdi-printer me-1"></i>Imprimantes</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarCategorie" aria-expanded="false" aria-controls="sidebarCategorie" class="side-nav-link">
                <i class="uil-store"></i>
                <span> Autre </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarCategorie">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('fournisseurs.index') }}"><i class="uil-store me-1"></i>Fournisseurs</a>
                    </li>
                    <li>
                        <a href="{{ route('familles.index') }}"><i class="uil-store me-1"></i>Famille Fourniture</a>
                    </li>
                    <li>
                        <a href="{{ route('typefours.index') }}"><i class="uil-store me-1"></i>Type de Fourniture</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    </ul>

    <!-- End Sidebar -->
        <div class="clearfix"></div>
    <!-- Sidebar -left -->

</div>
