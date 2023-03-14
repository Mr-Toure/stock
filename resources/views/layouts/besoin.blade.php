<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Logiciel des Moyens generaux du tribunal premeiere instance Bouake" name="description" />
    <meta content="Développeur fullstack (toure-simplice@outlook.fr)" name="Touré Simplice" />
    <title>DEMANDES DE CONSOMMABLES</title>
    <link rel="shortcut icon" href="favicon.jpg">
    <link rel="stylesheet" href="{{ asset('assets/besoins/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/besoins/css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/besoins/css/FontStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/besoins/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/besoins/css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--single{
            border: none;
            width: 100% !important;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
    <script src="{{ asset('assets/besoins/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/besoins/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/besoins/js/all.min.js') }}"></script>
</head>
<body>
@include('sweetalert::alert')
    <div class="error" id="idZone" onclick="this.style.display = 'none'">
    </div>
    <section id="main" class="noSun">
        <div id="middleBlue"></div>
        <div class="contens">
            <div class="first">
                <div class="mpb">
                    <img src="{{asset('/img/mairie.png')}}" alt="Logo Mairie de Port-Bouët">
                </div>
                <div style="margin: 0 auto;display: flex; justify-content: center;"><a href="{{ route('besoins.logout') }}" class="btn btn-outline-warning" > <i class="fas fa-power-off"></i> Déconnexion</a></div>
                <div class="menu">
                <ul>
                    <li <?php if($active == "home") echo 'class="active"'; ?>><a href="{{ route('besoins.home') }}">Nouveau Besoin</a></li>
                    <li <?php if($active == "current") echo 'class="active"'; ?>><a href="{{ route('besoins.current') }}">Demandes en Cours</a></li>
                    <li <?php if($active == "history") echo 'class="active"'; ?>><a href="{{ route('besoins.history') }}">Historique Demandes</a></li>
                </ul>
                </div>
                <div class="pb-sun">
                    <img src="{{asset('/img/logo.jpg')}}" alt="logo inci">
                </div>
            </div>
            @yield('content')
        </div>
    </section>

    <script>
    /*  $('.chosen').on('load', function() {
            $('.chosen').select2();
        }); */

        $(document).ready(function() {
            $(".chosen").select2({
                closeOnSelect: false
            });

            $(".chosen2").select2({
                closeOnSelect: false
            });

            $(".select_agent").select2({
                closeOnSelect: false
            });
        });
    </script>

</body>
</html>
