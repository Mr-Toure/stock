@extends('layouts.app')

@section('template_title')
    {{ $fourniture->name ?? 'Show Fourniture' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Fourniture</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fournitures.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Marque:</strong>
                            {{ $fourniture->marque }}
                        </div>
                        <div class="form-group">
                            <strong>Reference:</strong>
                            {{ $fourniture->reference }}
                        </div>
                        <div class="form-group">
                            <strong>Caracteristique:</strong>
                            {{ $fourniture->caracteristique }}
                        </div>
                        <div class="form-group">
                            <strong>Qte Seuil:</strong>
                            {{ $fourniture->qte_seuil }}
                        </div>
                        <div class="form-group">
                            <strong>C Moyen Achat:</strong>
                            {{ $fourniture->c_moyen_achat }}
                        </div>
                        <div class="form-group">
                            <strong>Picture:</strong>
                            {{ $fourniture->picture }}
                        </div>
                        <div class="form-group">
                            <strong>Typefour Id:</strong>
                            {{ $fourniture->typefour_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
