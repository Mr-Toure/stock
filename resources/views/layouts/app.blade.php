
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Moyen Généraux Bingerville</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Logiciel des Moyens généraux du tribunal premier instance Bingerville" name="description" />
        <meta content="Développeur fullstack (toure-simplice@outlook.fr)" name="Touré Simplice" />

        <!-- App favicon-->
        <link rel="shortcut icon" href="favicon.jpg">
        {{--  @notinfyCss --}}
       {{--  <link href="{{ asset('assets/css/stepform.css') }}" rel="stylesheet"> --}}
        <!-- CDN -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Datatables css -->
        <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <!-- <link href="assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />-->

        <!-- App css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{ asset('assets/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
        <!-- Styles -->
    </head>

    <body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        @include('sweetalert::alert')
        <!-- Topbar Start -->
        @include('includes.topbar')
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- Begin page -->
            <div class="wrapper">

                <!-- ========== Left Sidebar Start ========== -->
                    @include('includes.leftSideBar')
                <!-- Left Sidebar End -->

                <div class="content-page">
                    <div class="content">

                        <!-- start page title -->
                        <div class="row mb-4 mt-1">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Accueil</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Application</a></li>
                                            <li class="breadcrumb-item active">{{ $fil ?? 'Tableau de Bord'}}</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Gestion des Moyens Généraux <b>{{ $page ?? '' }}</b></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @yield('content')

                    </div> <!-- End Content -->

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <script>document.write(new Date().getFullYear())</script> © Fait avec
                                    <span class="text-danger" style="font-size: 1.5em">♥</span> Par
                                    <b class="text-danger">Mariade Sarl</b>
                                    Logiciel de Gestion Des Moyens Généraux Du Tribunal de Premiere Instance Bingerville
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="text-md-end footer-links d-none d-md-block">
                                        <a href="javascript: void(0);">About</a>
                                        <a href="javascript: void(0);">Support</a>
                                        <a href="javascript: void(0);">Contact Us</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div> <!-- content-page -->

            </div> <!-- end wrapper-->
        </div>

        <!-- END Container -->


        <!-- Right Sidebar -->
        @include('includes.sidebar')

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <x:notify-messages />
        @notifyJs

        <!-- bundle -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        <!-- third party js -->
        <script src="{{ asset('assets/js/vendor/Chart.bundle.min.js') }}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{ asset('assets/js/pages/demo.dashboard-projects.js') }}"></script>
        <!-- end demo js-->

        <!-- Datatables js -->
        <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.checkboxes.min.js') }}"></script>

        <!-- Datatable Init js -->
        <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>

        <!-- Datatables js -->
        <script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/demo.form-wizard.js') }}"></script>
    </body>
</html>
