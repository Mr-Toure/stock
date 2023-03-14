@extends('layouts.auth')
@section('content')
    <div class="account-pages pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center scolar-bg">
                            <a href="index.html" class="text-white">
                                <h1>Moyens Generaux</h1>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center">
                                <img src="{{ asset('img/justice.png') }}" alt="" width="175">
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email: </label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Entrer votre e-mail">
                                </div>

                                <div class="mb-3">

                                    <label for="password" class="form-label">Mot de Passe: </label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" autocomplete="current-password" required class="form-control" placeholder="Code Secret">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-link" id="tooltip-container2">
                                        <a href="{{ route('besoins.auth') }}" class="btn btn-success"><i class="mdi mdi-hand-heart app-text-color" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="Emmettre un <b class='text-info'><em>Besoin</em></b>"></i></a>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" style="background" type="submit">Se Connecter</button>
                                </div>

                            </form>
                        </div><!-- end card-body -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@stop
