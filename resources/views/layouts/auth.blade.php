
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>MyStock Bingerville</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Logiciel des Moyens généraux du tribunal premier instance Bingerville" name="description" />
        <meta content="Développeur fullstack (toure-simplice@outlook.fr)" name="Touré Simplice" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="favicon.jpg">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app-modern.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" id="light-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"darkMode":falses}'>
        @include('sweetalert::alert')
        @yield('content')
        <!-- end page -->

        <footer class="footer footer-alt">
            2024 © MyStock(Touré Simplice) - Sous-Direction Informatique
        </footer>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>
</html>
