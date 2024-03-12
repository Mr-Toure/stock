
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Page de connexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Gestion de stock" name="Toure Simplice" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="favicon.jpg">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app-modern.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" id="light-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
        @include('sweetalert::alert')
        @yield('content')
        <!-- end page -->

        <footer class="footer footer-alt">
            2022 © scolar - Sous-Direction Informatique
        </footer>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>
</html>
