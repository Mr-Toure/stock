@extends('layouts.app')

@section('template_title')
    Famille d'article à gérer
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Ajouter une nouvelle famille</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('familles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('famille.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
