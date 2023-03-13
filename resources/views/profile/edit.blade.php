@extends('layouts.app')
@section('content')
    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
        <li class="nav-item">
            <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                <span class="d-none d-md-block">Modifier Mot de Passe</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#profile1" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                <span class="d-none d-md-block">Information</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                <span class="d-none d-md-block">Suppression de Compte</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane" id="home1">
            <div class="row justify-content-center items-align-center">
                <div class="col-md-6">
                    <div class="card border-secondary border">
                        <div class="card-body">
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                <div class="form-floating mb-3">
                                    <input id="floatingInput" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    <label for="floatingInput">Ancien Mot de passe</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input id="floatingInput" name="password" type="password" class="form-control" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    <label for="floatingInput">Nouveau Mot de passe</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input id="floatingInput" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    <label for="floatingInput">Confirmer Mot de passe</label>
                                </div>

                                <div class="d-flex justify-content-center gap-4">
                                    <x-primary-button class="btn btn-warning m-2">{{ __('Save') }}</x-primary-button>
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
        </div>
        <div class="tab-pane show active" id="profile1">
            <div class="row justify-content-center items-align-center">
                <div class="col-md-6">
                    <div class="card border-secondary border">
                        <div class="card-body">
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>
                            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')

                                <div class="form-floating mb-3">
                                    <input name="name" type="text" class="form-control" id="floatingInput" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                    <label for="floatingInput">Nom & Prénom</label>
                                </div>

                                <div class="form-floating">
                                    <input class="form-control" id="floatingPassword" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', $user->email) }}" required autocomplete="email" />
                                    <label for="floatingPassword">Email</label>
                                </div>
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            {{ __('Your email address is unverified.') }}

                                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif

                                <div class="d-flex justify-content-center gap-4">
                                    <x-primary-button class="btn btn-warning m-2">{{ __('Save') }}</x-primary-button>

                                    @if (session('status') === 'profile-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="btn btn-warning"
                                        >{{ __('Sauvegarder.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
        </div>
        <div class="tab-pane" id="settings1">
            <div class="row justify-content-center items-align-center">
                <div class="col-md-6">
                    <div class="card border-secondary border">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="text-info">
                                    <p>Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.</p>
                                </div>
                                <!-- Static Backdrop modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Supprimer Mon Compte
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content modal-filled bg-danger">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Suppression de Compte</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                        </div> <!-- end modal header -->
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                                @csrf
                                                @method('delete')

                                                <h2 class="text-lg font-medium text-gray-900">
                                                    {{ __('Etes-vous certain de vouloir supprimer votre compte?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.') }}
                                                </p>

                                                <div class="mt-6">
                                                    <x-input-label for="password" value="Mot de Passe" class="sr-only" />

                                                    <input
                                                        id="password"
                                                        name="password"
                                                        type="password"
                                                        class="form-control"
                                                        placeholder="Entrer Votre Mot de passe"
                                                    />

                                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                                </div>

                                                <div class="modal-footer">
                                                    <x-secondary-button data-bs-dismiss="modal">
                                                        {{ __('Annuler') }}
                                                    </x-secondary-button>

                                                    <x-danger-button class="btn btn-danger border-white border">
                                                        {{ __('Supprimer') }}
                                                    </x-danger-button>
                                                </div> <!-- end modal footer -->
                                            </form>
                                        </div>

                                    </div> <!-- end modal content-->
                                </div> <!-- end modal dialog-->
                            </div> <!-- end modal-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
