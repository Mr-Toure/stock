@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Creation d'un nouvel utilisateur</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('users.index') }}"> retour</a>

            </div>

        </div>

    </div>



    @if (count($errors) > 0)

        <div class="alert alert-danger m-4">

            <strong>Whoops!</strong> il y a un problème avec vos saissies.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif




    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

    <div class="card p-4 mt-3">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nom et Prenom(s):</strong>

                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Mot de passe:</strong>

                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Confirmation du mot de passe:</strong>

                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Role:</strong>

                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Soumettre</button>

            </div>

        </div>
    </div>

    {!! Form::close() !!}


@endsection
