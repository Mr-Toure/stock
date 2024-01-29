@extends('layouts.app')

@section('template_title')
    {{ $fonction->name ?? 'Show Fonction' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Fonction</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fonctions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $fonction->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Initial:</strong>
                            {{ $fonction->initial }}
                        </div>
                        <div class="form-group">
                            <strong>Direction Id:</strong>
                            {{ $fonction->direction_id }}
                        </div>
                        <div class="form-group">
                            <strong>Ssdirection Id:</strong>
                            {{ $fonction->ssdirection_id }}
                        </div>
                        <div class="form-group">
                            <strong>Service Id:</strong>
                            {{ $fonction->service_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
